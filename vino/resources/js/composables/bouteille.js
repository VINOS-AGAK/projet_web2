import { ref, inject } from 'vue';
import { useRouter, useRoute } from 'vue-router';

export default function useBouteille() {
    const router = useRouter();
    const route = useRoute();
    let mesBouteilles = ref({});
    const uneBouteille = ref({});
    const validationErrors = ref ({});
    const isLoading = ref(false);
    const swal = inject('$swal');
    const axios = require('axios');
    const routeParam = route.params.routeParam;



    const getMesBouteilles = async () => {
        axios.get('api/bouteille')
        .then(response=>{
            mesBouteilles.value = response.data.data;
        })
    }

    const trierMesBouteilles = async (itemName) => {
        axios.get('api/bouteille/{$itemName}')
        .then(response=>{
            mesBouteilles.value = response.data.data;
           console.log(itemName)
        })
    }

    const getUneBouteille = async (id) => {
        axios.get('api/bouteille/' + id )
        .then(response=>{
            uneBouteille.value = response.data.data;
        })
    } 

        /**
     * Ajoute une bouteille dans le cellier choisi
     * @param {object} cellier 
     * @returns 
     */
    const storeBouteille = async (bouteille) => { 
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}
        
        axios.post('/api/bouteille', bouteille)
        .then(response => {
            router.push({name: 'bouteille.index', params: {id: bouteille.vino__cellier_id} })
            swal({
                    icon : 'success',
                    title: 'bouteille Ajouté Avec Succès'
                })
        })
        .catch(error =>{
            if(error.response?.data){
                validationErrors.value = error.response.data.errors
            }
        })
        .finally(() => isLoading.value = false)
    }


    const updateBouteille = async (bouteille) => {
        isLoading.value = true
        try {
          const response = await axios.put(`/api/bouteilles/${bouteille.id}`, bouteille)
          isLoading.value = false
          return response.data
        } catch (error) {
          isLoading.value = false
          if (error.response && error.response.status === 422) {
            validationErrors.value = error.response.data.errors
          } else {
            throw error
          }
        }
      }



    return {
        mesBouteilles,
        uneBouteille,
        validationErrors, 
        routeParam,
        isLoading,
        getMesBouteilles,
        getUneBouteille,
        storeBouteille,
        updateBouteille,
        trierMesBouteilles,
    }
}


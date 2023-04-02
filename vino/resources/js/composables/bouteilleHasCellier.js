import { ref, inject, reactive, getCurrentInstance } from 'vue';
import { useRouter} from 'vue-router'
import { onMounted } from "vue";
import useAuth from "./auth";

export default function useBHC() {
    const router = useRouter();
    let mesBouteilles = ref({});
    const uneBouteille = ref({});
    const validationErrors = ref ({});
    const isLoading = ref(false);
    const { user } = useAuth();
    const swal = inject('$swal');
    const axios = require('axios');
    const { $route } = getCurrentInstance().proxy
    const cellier_id = $route.params.id

    /**
     * Ajoute une bouteille dans le cellier choisi
     * @param {object} cellier 
     * @returns 
     */
    const storeNote = async (bouteille) => { 
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}
        
        console.log('Log de la bouteille dans la fonction storeBouteille', bouteille);
        axios.post('/api/bouteille', bouteille)
        .then(response => {
            router.push({name: 'bouteille.index'})
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

    const deleteBouteille = async (id) => { 
        swal({
            title: 'Êtes-vous sûr(e)?',
            text: 'Vous ne pourrez pas annuler cette action !',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Oui, supprimez-le !',
            confirmButtonColor: '#ef4444',
            timer: 20000,
            timerProgressBar: true,
            reverseButtons: true
        })
        .then(result =>{
            if (result.isConfirmed){
                console.log(id);

                axios.delete('/api/bouteille/' + id)
                .then(response => {
                   
                    getMesBouteilles()
                    router.push({name: 'bouteille.index'})
                    swal({
                            icon: 'success',
                            title : 'Suppression Effecté Avec Succès'
                        })
                })
                .catch(error =>{
                    swal({
                        icon: 'error',
                        title : 'Une Erreur Est Arrivée'
                    })
                })
            }

        })

    }

    return {
        storeNote,
    }
}


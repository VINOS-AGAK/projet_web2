// Importation des fonctions de Vue.js et de Vue Router
import { ref, inject, reactive, getCurrentInstance } from 'vue';
import { useRouter, useRoute } from 'vue-router'
import { onMounted } from "vue";
import useAuth from "../composables/auth";

// Fonction qui permet d'utiliser bouteilles
export default function useBouteille() {
    // Déclaration des variables qui contiendront les données des bouteille
    const router = useRouter();
    const route = useRoute();
    let mesBouteilles = ref({});
    const uneBouteille = ref({});
    let bouteillesTrier = ref({});
    const validationErrors = ref ({});
    const isLoading = ref(false);
    
    // Injection de la bibliothèque SweetAlert
    const swal = inject('$swal');
    // Importation de la bibliothèque axios pour effectuer les requêtes HTTP
    const axios = require('axios');
    const routeParam = route.params.routeParam;


    // Récupère toutes les bouteilles
    const getMesBouteilles = async () => {
        axios.get('api/bouteille')
        .then(response=>{
            mesBouteilles.value = response.data.data;
        })
    }


      const trierMesBouteilles = async (itemName, trier) => {
        const response = await axios.get('api/bouteille/');
        
        const bouteillesTrier = new Set();
        response.data.data.forEach(bouteille => {
          if (bouteille.pays == itemName) {
            bouteillesTrier.add(bouteille);
          }
        });
        
        return Array.from(bouteillesTrier);
      };
      

    // Récupère une bouteille
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
        bouteille.notes = 1;
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


    // Met à jour une bouteille
    const updateBouteille = async (bouteille) => {
        console.log('updateBouteille bouteille:');
        console.log(bouteille);
        console.log('=======================');
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


    // Retourne les variables et fonctions nécessaires
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
        validationErrors, 
        trierMesBouteilles, 
        bouteillesTrier
    }
}


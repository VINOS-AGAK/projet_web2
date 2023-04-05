// Importation des fonctions de Vue.js et de Vue Router
import { ref, inject, reactive, getCurrentInstance } from 'vue';
import { useRouter} from 'vue-router'
import { onMounted } from "vue";
import useAuth from "../composables/auth";

// Fonction qui permet d'utiliser bouteilles
export default function useBouteille() {
    // Déclaration des variables qui contiendront les données des bouteille
    const router = useRouter();
    let mesBouteilles = ref({});
    const uneBouteille = ref({});
    const validationErrors = ref ({});
    const isLoading = ref(false);
    const { user } = useAuth();
    // Injection de la bibliothèque SweetAlert
    const swal = inject('$swal');
    // Importation de la bibliothèque axios pour effectuer les requêtes HTTP
    const axios = require('axios');
    const { $route } = getCurrentInstance().proxy
    const cellier_id = $route.params.id


    // Récupère toutes les bouteilles
    const getMesBouteilles = async () => {
        axios.get('api/bouteille')
        .then(response=>{
            mesBouteilles.value = response.data.data;
            //console.log('Mes Bouteilles');
            console.log(mesBouteilles.value);
        })
    }

    // Trie les bouteilles
    const trierMesBouteilles = async (itemName) => {
        axios.get('api/bouteille/{$itemName}')
        .then(response=>{
            mesBouteilles.value = response.data.data;
           console.log(itemName)
        })
    }

    // Récupère une bouteille
    const getUneBouteille = async (id) => {
        axios.get('api/bouteille/' + id )
        .then(response=>{
            uneBouteille.value = response.data.data;
            console.log('une bouteille du cellier');
            console.log(uneBouteille);
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

      // Supprime une bouteille
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
                            title : 'Suppression effectuée avec succès'
                        })
                })
                .catch(error =>{
                    swal({
                        icon: 'error',
                        title : 'Une erreur est survenue'
                    })
                })
            }

        })

    }

    // Retourne les variables et fonctions nécessaires
    return {
        mesBouteilles,
        uneBouteille,
        getMesBouteilles,
        getUneBouteille,
        deleteBouteille,
        storeBouteille,
        updateBouteille,
        validationErrors, 
        isLoading,
        trierMesBouteilles
    }
}


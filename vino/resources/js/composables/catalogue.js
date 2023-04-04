// Importation des fonctions de Vue.js et de Vue Router
import { ref, inject } from 'vue';
import { useRouter} from 'vue-router';

// Fonction qui permet d'utiliser le catalogue
export default function useCatalogue() {

    // Déclaration des variables qui contiendront les données du catalogue
    const catalogue = ref([]);
    const oneCatalogue = ref({});
    const router = useRouter();
    const validationErrors = ref ({});
    const isLoading = ref(false);

    // Injection de la bibliothèque SweetAlert
    const swal = inject('$swal');

    // Importation de la bibliothèque axios pour effectuer les requêtes HTTP
    const axios = require('axios');

    // Fonction qui permet de récupérer tous les éléments du catalogue
    const getCatalogue = async () => {
        axios.get('api/catalogue')
        .then(response=>{
            catalogue.value = response.data.data;
            //console.log('le catalogue');
            console.log(catalogue.value);
        })
    }
    
    // Fonction qui permet de récupérer un élément du catalogue en fonction de son ID
    const getOneCatalogue = async (id) => {
        axios.get('api/catalogue/' + id )
        .then(response=>{
            oneCatalogue.value = response.data.data;
            console.log('une bouteille du catalogue');
            console.log(oneCatalogue);
        })
    } 

    // Fonction qui permet de sauvegarder un élément du catalogue
    const storeCatalogue = async (catalogue) => { 
        if(isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.post('/api/catalogue', catalogue)
        .then(response => {
            router.push({name: 'catalogue.index'})
            swal({
                    icon : 'success',
                    title: 'Bouteille Ajouté Avec Succès'
                })
        })
        .catch(error =>{
            if(error.response?.data){
                validationErrors.value = error.response.data.errors
            }
        })
        .finally(() => isLoading.value = false)
    }

    // Fonction qui permet de mettre à jour un élément du catalogue
    const updateCatalogue = async (catalogue) => { 
        if(isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.put('/api/catalogue/' + catalogue.id, catalogue)
        .then(response => {
            router.push({name: 'catalogue.index'})
            swal({
                    icon: 'success',
                    title : 'Modification Effecté Avec Succès'
                })
        })
        .catch(error =>{
            if(error.response?.data){
                validationErrors.value = error.response.data.errors
            }
        })
        .finally(() => isLoading.value = false)
    }

    // Fonction qui permet de supprimer un élément du catalogue
    const deleteCatalogue = async (id) => { 
        swal({
            title: 'Êtes-vous sûr ?',
            text: 'Vous ne pourrez pas revenir en arrière !',
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
                axios.delete('/api/catalogue/' + id)
                .then(response => {
                    getCatalogue()
                    router.push({name: 'catalogue.index'})
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
    return { catalogue, 
            oneCatalogue, 
            getCatalogue, 
            getOneCatalogue, 
            storeCatalogue, 
            updateCatalogue,
            deleteCatalogue, 
            validationErrors, 
            isLoading,
        } 
}


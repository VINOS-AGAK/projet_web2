import { ref, inject, reactive, getCurrentInstance } from 'vue';
import { useRouter} from 'vue-router'
import { onMounted } from "vue";
import useAuth from "./auth";

export default function useBHC() {
    const router = useRouter();
    let BouteilleHasCellier = ref({});
    const validationErrors = ref ({});
    const isLoading = ref(false);
    const swal = inject('$swal');
    const axios = require('axios');
    const { $route } = getCurrentInstance().proxy
    // const cellier_id = $route.params.id

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

    const getOneBouteilleHasCellier = async (id) => {
        console.log(id)
        try{
            const response = await axios.get('api/BouteilleHasCellierController/' + id )
            oneBouteilleHasCellier.value = response.data.data;
            console.log('un BouteilleHasCellier');
            console.log(BouteilleHasCellier);
            return oneCellier.value;
        }
        catch (error){
            console.error('Error fetching one BouteilleHasCellier', error);
        }
    } 

    const updateNote = async (bouteille) => { 
        console.log('updateNote bouteille:');
        console.log(bouteille);
        console.log('=======================');
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.put('/api/BouteilleHasCellierController/' + bouteille.id, bouteille)
        .then(response => {
            router.push({name: 'cellier.index'})
            swal({
                    icon: 'success',
                    title : 'Modification de votre Note bouteille a ete effecté Avec Succès'
                })
        })
        .catch(error =>{
            if(error.response?.data){
                validationErrors.value = error.response.data.errors
            }
        })
        .finally(() => isLoading.value = false)
    }

    return {
        storeNote,
        updateNote
    }
}


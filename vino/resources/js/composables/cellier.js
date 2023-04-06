import { ref, inject } from 'vue';
import { useRouter} from 'vue-router'
import { onMounted } from "vue";
import useAuth from "../composables/auth";


export default function useCellier() {

    let mesCellier = ref({});
    const oneCellier = ref({});
    const showCellier = ref({});
    const router = useRouter();
    const { user } = useAuth();
    const validationErrors = ref ({});
    const isLoading = ref(false);
    const swal = inject('$swal');
    const axios = require('axios');


    /**
     * Affiche les cellires de usager
     * @param {object} cellier 
     * @returns {Array} mesCellier
     */
    const getCelliers = async () => {
        axios.get('api/cellier')
        .then(response=>{
            mesCellier.value = response.data.data;
            mesCellier = mesCellier.value;
        })
    } 
    
    const showOneCellier = async (id) => {
        console.log(id)
        try{
            const response = await axios.get('api/cellier/' + id )
            showCellier.value = response.data.data;
            console.log('un cellier');
            console.log(showCellier);
            return showCellier.value;
        }
        catch (error){
            console.error('Error fetching one cellier', error);
        }
    }

    /**
     * Afficher un Cellie de usager
     * @param {id} id 
     * @returns {Array} oneCellier
     */
    const getOneCellier = async (id) => {
        try{
            const response = await axios.get('api/cellier/' + id )
            oneCellier.value = response.data.data;
            return oneCellier.value;
        }
        catch (error){
            console.error('Error fetching one cellier', error);
        }
    } 

    const trierMonCellier = async (itemName, trier, id) => {

        const response = await axios.get('api/bouteille/' + id);
        const showOneCellier = async (id) => {

            try{
                const response = await axios.get('api/cellier-modifier/' + id )
                showCellier.value = response.data.data;
                return showCellier.value;
            }
            catch (error){
                console.error('Error fetching one cellier', error);
            }
        }

        let cellierTrier = [];
        response.data.data.forEach(bouteille => {
          if (bouteille.pays == itemName) {
            cellierTrier.push(bouteille);
          }
        });
        
        return cellierTrier;
        
      };



    /**
     * Cree un Cellie de usager
     * @param {object} cellier 
     * @returns 
     */
    const storeCellier = async (cellier) => { 
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.post('/api/cellier', cellier)
        .then(response => {
            router.push({name: 'cellier.index'})
            swal({
                    icon : 'success',
                    title: 'Cellier Ajouté Avec Succès'
                })
        })
        .catch(error =>{
            if(error.response?.data){
                validationErrors.value = error.response.data.errors
            }
        })
        .finally(() => isLoading.value = false)
    }

    /**
     * Modifier un Cellie de usager
     * @param {object} cellier
     * @returns 
     */
    const updateCellier = async (cellier) => { 
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}
        console.log('updateCellier / cellier');

        axios.put('/api/cellier/' + cellier.id, cellier)
        .then(response => {
            router.push({name: 'cellier.index'})
            swal({
                    icon: 'success',
                    title : 'Modification de votre cellier a ete effecté Avec Succès'
                })
        })
        .catch(error =>{
            if(error.response?.data){
                validationErrors.value = error.response.data.errors
            }
        })
        .finally(() => isLoading.value = false)
    }


    /**
     * Efface un Cellie de usager
     * @param {id} id 
     */
    const deleteCellier = async (id) => { 
        swal({
            title: 'Êtes-vous sûr(e) ?',
            text: 'Vous ne pourrez pas annuler cette action !',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Oui, effacez mon cellier !',
            confirmButtonColor: '#ef4444',
            timer: 20000,
            timerProgressBar: true,
            reverseButtons: true
        })
        .then(result =>{
            if (result.isConfirmed){
                axios.delete('/api/cellier/' + id)
                .then(response => {
                    getCelliers()
                    router.push({name: 'cellier.index'})
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


    return {
        mesCellier,
        oneCellier,
        isLoading,
        user,
        validationErrors,
        showCellier,
        getOneCellier,
        getCelliers,
        storeCellier,
        updateCellier,
        deleteCellier,
        showOneCellier, 
        trierMonCellier
    }
}

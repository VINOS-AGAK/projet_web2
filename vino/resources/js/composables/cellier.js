import { ref, inject } from 'vue';
import { useRouter} from 'vue-router'
import { onMounted } from "vue";
import useAuth from "../composables/auth";


export default function useCellier() {

    let mesCellier = ref({});
    const router = useRouter();
    const { user } = useAuth();
    const validationErrors = ref ({});
    const isLoading = ref(false);
    const swal = inject('$swal');
    const axios = require('axios');


    /* afficher mes cellires */
    const getMesCellier = async () => {
        axios.get('api/cellier/')
        .then(response=>{
            mesCellier.value = response.data.data;
            mesCellier = mesCellier.value;
            console.log('mes Cellier');
            console.log(mesCellier);
        })
    } 


    /* modifier mon cellier */
    const storeCellier = async (cellier) => { 
        if(isLoading.value) return;

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


    /* modifier mon cellie */
    const updateCellier = async (cellier) => { 
        if(isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

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


    /* effacer mon cellier */
    const deleteCellier = async (id) => { 
        swal({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this action!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            confirmButtonColor: '#ef4444',
            timer: 20000,
            timerProgressBar: true,
            reverseButtons: true
        })
        .then(result =>{
            if (result.isConfirmed){
                axios.delete('/api/cellier/' + id)
                .then(response => {
                    getMesCellier()
                    router.push({name: 'cellier.index'})
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
        mesCellier,
        getMesCellier,
        storeCellier,
        updateCellier,
        deleteCellier,
        isLoading,
        validationErrors,
        user
    }
}

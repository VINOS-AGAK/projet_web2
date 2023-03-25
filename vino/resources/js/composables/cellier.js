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

    const getMesCellier = async () => {
        axios.get('api/cellier/')
        .then(response=>{
            mesCellier.value = response.data.data;
            mesCellier = mesCellier.value;
            console.log('mes Cellier');
            console.log(mesCellier);
        })
    } 


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



    return {
        mesCellier,
        isLoading,
        validationErrors,
        getMesCellier,
        storeCellier,
        user
    }
}

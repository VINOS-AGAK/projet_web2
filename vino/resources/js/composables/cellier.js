import { ref, inject } from 'vue';
import { useRouter} from 'vue-router'
import { onMounted } from "vue";
import useAuth from "../composables/auth";


export default function useCellier() {

    const router = useRouter();
    // const cellier = ref({});
    let mesCellier = ref({});
    // let unCellier = ref({});
    const { user } = useAuth();


    /* TODO: Pour pluseur cellier( Later ) */
    const getMesCellier = async () => {
        axios.get('api/cellier/' + user.id )
        .then(response=>{
            mesCellier.value = response.data.data;
            mesCellier = mesCellier.value;
            console.log('mes Cellier');
            console.log(mesCellier);
            // console.log(mesCellier.value);
        })
    } 
    

    // const getOneCellier = async () => {
    //     axios.get('api/cellier/' + user.id )
    //     .then(response=>{
    //         unCellier.value = response.data.data;
    //         unCellier = unCellier.value;
    //         console.log('une cellier');
    //         console.log(unCellier);
    //         // console.log(mesCellier.value);
    //     })
    // } 

    return {

        // unCellier,
        // getOneCellier

        /* TODO: Pour pluseur cellier( Later ) */
        mesCellier,
        getMesCellier
    }
}

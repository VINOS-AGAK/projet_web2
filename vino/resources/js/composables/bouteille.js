import { ref, inject } from 'vue';
import { useRouter} from 'vue-router'
import { onMounted } from "vue";
import useAuth from "../composables/auth";


export default function useBouteille() {

    const router = useRouter();
    let mesBouteilles = ref({});
    const { user } = useAuth();

    const getMesBouteilles = async () => {
        axios.get('api/bouteille')
        .then(response=>{
            mesBouteilles.value = response.data.data;
            console.log('Mes Bouteilles');
            console.log(mesBouteilles.value);
        })
    }

    return {

        mesBouteilles,
        getMesBouteilles

    }
}

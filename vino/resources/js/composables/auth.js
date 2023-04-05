// Importation des modules Vue
import { ref, reactive, inject } from 'vue';
import { useRouter} from 'vue-router';

// Déclaration d'un objet "user" réactif avec des propriétés vides
const user = reactive ({
    name: '',
    email: '',

})

// Exportation d'une fonction "useAuth"
export default function useAuth() {

    // Déclaration de variables réactives
    const processing = ref(false);
    const validationErrors = ref ({});
    const isLoading = ref(false);
    const router = useRouter();
    const swal = inject('$swal');
    const axios = require('axios');
    let loading = true;

    // Déclaration d'objets réactifs pour les formulaires de login et d'inscription
    const loginForm = reactive({
            email: '',
            password: '',
            remember: false
    })
    
    const registerForm = reactive({
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
    })

    // Fonction pour enregistrer un nouvel utilisateur
    const registerUser = async () => {
        if (isLoading.value) return;

        isLoading.value = true;
        validationErrors.value = {};

        axios.post('/api/user', registerForm)
            .then(response => {
                router.push({name: 'login'});
                swal({
                    icon: 'success',
                    title: 'Usagé enregistré avec succès, veuillez vous connecter!',
                });
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors;
                }
            })
            .finally(() => isLoading.value = false);
    };

    // Fonction pour soumettre le formulaire de login
    const submitLogin = async () => {
        if (processing.value) return

        processing.value = true
        validationErrors.value = {}

        axios.post('/login', loginForm)
        .then(async response => {
            loginUser(response)
        })
        .catch(error => {
            if (error.response?.data) {
                validationErrors.value = error.response.data.errors
            }
        })
        .finally(() => processing.value = false)
    }
    
    // Fonction pour connecter l'utilisateur
    const loginUser = (response) => {
        user.name = response.data.name,
        user.email = response.data.email,
        user.id = response.data.id
        localStorage.setItem('loggedIn', JSON.stringify(true))
        router.push({ name: 'cellier.index' })
    }

    // Fonction pour récupérer les informations de l'utilisateur
    const getUser = () => {
        axios.get('/api/user')
        .then(response => {
            loading = false;
            loginUser(response)
        })
        .catch(error => {
            // console.error(error);
            if (error.response?.data) {
                validationErrors.value = error.response.data.errors;
                if (error.response.status === 401) {
                    // Stop the request if an Unauthorized response status code is received
                    return;
                }
            }
        });
    }

    // Fonction pour déconnecter l'utilisateur
    const logout = async () => {
        if (processing.value) return

        processing.value = true

        axios.post('/logout')
            .then(response => router.push({ name: 'login' }))
            .catch(error => {
                swal({
                    icon: 'error',
                    title: error.response.status,
                    text: error.response.statusText
                })
            })
            .finally(() => {
                processing.value = false
            })
    }

    // Retourne les variables et fonctions nécessaires
    return { loginForm,
             registerForm, 
            validationErrors,
            processing,
            user,
            submitLogin,
            registerUser,
            getUser,
            logout,
            } 
}
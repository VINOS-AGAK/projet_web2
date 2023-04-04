<template>
    <main class="container-signup">
        <div class="header-form">
            <h3>Bienvenue</h3>
        </div>
        <div class="container-form">

            <form @submit.prevent="submitLogin">

                <p v-if="loading">Loading...</p>

                <p class="text-form">courriel</p>
                <input v-model="loginForm.email" id="email" type="email" class="email" required autofocus
                    autocomplete="username">

                <!-- Validation Errors -->
                <div v-for="message in validationErrors?.email">
                    {{ message }}
                </div>

                <!-- Password -->
                <p class="text-form">mot de passe</p>
                <input v-model="loginForm.password" id="password" type="password" class="password" required
                    autocomplete="current-password">

                <!-- Validation Errors -->
                <div v-for="message in validationErrors?.password">
                    {{ message }}
                </div>

                <!-- Remember me -->
                <p class="text-form">
                    <input type="checkbox" name="remember" v-model="loginForm.remember" class="text-form" />
                    <span class="text-form">Se souvenir de moi</span>
                </p>
                <p class="text-form">Vous n'avez pas de compte? Cliquez                                 
                    <router-link :to="{ name: 'register' }" active-class="border-b-2 border-indigo-400" class="text-login">ici
                    </router-link></p>

                <!-- Buttons -->
                <button class="btn-submit" :disabled="processing">
                    Log in
                </button>

            </form>
        </div>

    </main>
</template>
 
<script>
// Import du hook "useAuth" pour la gestion de l'authentification
import useAuth from '../../composables/auth'
export default {
    setup() {
        // Récupération des fonctions et des données nécessaires pour l'authentification grâce au hook "useAuth"
        const { loginForm, validationErrors, processing, submitLogin } = useAuth()
        // Retourne les données nécessaires pour l'affichage du formulaire de connexion
        return { 
            loginForm, 
            validationErrors, 
            processing, 
            submitLogin, 
            loading: false // Ajout d'une propriété "loading" initialisée à "false"
        }
    }
}
</script>
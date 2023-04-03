<template>
    <main class="container-signup">
        <div class="header-form">
            <h3>Créer votre compte</h3>
        </div>
        <div class="container-form">

            <form @submit.prevent="registerUser">

                <p v-if="loading">Loading...</p>

                <p class="text-form">nom</p>
                <input v-model="registerForm.name" id="name" type="text" class="name" required autofocus>

                <!-- Validation Errors -->
                <div v-for="message in validationErrors?.email">
                    {{ message }}
                </div>
                <p class="text-form">courriel</p>
                <input v-model="registerForm.email" id="email" type="email" class="email" required autofocus>

                <!-- Validation Errors -->
                <div v-for="message in validationErrors?.email">
                    {{ message }}
                </div>

                <!-- Password -->
                <p class="text-form">mot de passe</p>
                <input v-model="registerForm.password" id="password" type="password" class="password" required>

                <!-- Validation Errors -->
                <div v-for="message in validationErrors?.password">
                    {{ message }}
                </div>

                <p class="text-form">confirmation mot de passe</p>
                <input v-model="registerForm.password_confirmation" id="password_confirmation" type="password" class="password" required>

                <!-- Validation Errors -->
                <div v-for="message in validationErrors?.password_confirmation">
                    {{ message }}
                </div>



                <!-- Buttons -->
                <button class="btn-submit" :disabled="processing">
                    Créer un compte
                </button>

            </form>
        </div>

    </main>
</template>
 
<script>
import useAuth from '../../composables/auth'
export default {
    setup() {
        const { registerForm, validationErrors, processing, registerUser } = useAuth()
        return { registerForm, validationErrors, processing, registerUser, loading: false }
    }
}
</script>
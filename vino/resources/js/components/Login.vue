<template>
   <main  class="container-signup">
    <div class="header-form">
            <h3>Welcome</h3>
    </div>
    <div class="container-form">

        <form @submit.prevent="submitLogin">

            <p class="text-form">courriel</p>
            <input v-model="loginForm.email" id="email" type="email" class="email" required autofocus autocomplete="username">

            <!-- Validation Errors -->
            <div v-for="message in validationErrors?.email">
                {{ message }}
            </div>

            <!-- Password -->
            <p class="text-form">mot de passe</p>
            <input v-model="loginForm.password" id="password" type="password" class="password" required autocomplete="current-password">
            
            <!-- Validation Errors -->
            <div v-for="message in validationErrors?.password">
                {{ message }}
            </div>

            <!-- Remember me -->
            <p class="text-form">
                <input type="checkbox" name="remember" v-model="loginForm.remember" class="text-form" />
                <span class="text-form">Remember me</span>
            </p>

            <!-- Buttons -->
            <div class="">
                <button class="text-form">
                    Log in
                </button>
            </div>

        </form>
    </div>
    
   </main>
    
</template>

<script>
import useAuth from '../composables/auth'

export default {
    setup() {
        const { loginForm, validationErrors, processing, submitLogin } = useAuth()
        return { loginForm, validationErrors, processing, submitLogin }
    }
}
</script>
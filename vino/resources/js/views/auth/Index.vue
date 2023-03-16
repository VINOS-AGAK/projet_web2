

<template>
    <main class="container-signup">

        <div class="header-form">
            <h3>Welcome</h3>
        </div>

        <div class="container-form">

            <form action="" method="post">
                @csrf
                <p class="text-form">Log in to your account</p>

                <input type="email" placeholder="email" class="email" name="email" value="">

                <!-- <div v-if="$errors.has('email')" class="text-form"> -->
                    <!-- {{ $errors.first('email') }} -->
                <!-- </div> -->

                <input type="password" placeholder="password" class="password" name="password">

                <!-- <div v-if="$errors.has('password')" class="text-form"> -->
                    <!-- {{ $errors.first('password') }} -->
                <!-- </div> -->

                <input type="submit" value="submit" class="submit">
            </form>
        </div>
    </main>
</template>


<script>
// import Header from '../Header.vue';

export default {
    name: "login",
}
</script>

<style scoped></style>
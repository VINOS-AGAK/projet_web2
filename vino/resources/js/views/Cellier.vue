<template>
    <!-- <headerView /> -->
          <h1 class="accueil-titre">cellier.vue</h1>
          


</template>

<script>


export default {
    name: "main",
    data() {
        return {
            loggedUser : document.querySelector("meta[name='user']").getAttribute('content')
        }
    },
    mounted() {
        console.log(this.loggedUser);
    },
}
</script>

<style scoped>

</style>
<template>
    <!-- <headerView /> -->
          <h1 class="accueil-titre">cellier.vue</h1>
          


</template>

<script>


export default {
    name: "main",
    data() {
        return {
            user: [],
        }
    },
    mounted() {
        this.fetchUser();
    },
    methods: {
        fetchUser(){
            axios
            .get("api/user")
        }
    }
    // mounted() {
    //     console.log(this.loggedUser);
    // },
}
</script>

<style scoped>

</style>
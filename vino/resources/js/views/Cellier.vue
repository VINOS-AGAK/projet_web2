<template>
    <!-- <headerView /> -->
          <h1 class="accueil-titre">cellier.vue</h1>
          


</template>

<script>


export default {
    name: "main",
    data() {
        return {
            user_id: "",
        }
    },
    methods: {
        fetchUserId(){
            axios
            .get("user_id")
        }
    }
    // mounted() {
    //     console.log(this.loggedUser);
    // },
}
</script>

<style scoped>

</style>
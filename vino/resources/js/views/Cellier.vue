<template>
    <!-- <headerView /> -->
          <h1 class="accueil-titre">cellierzzzzzzzz.vue</h1>
            <!-- <div id="users">{{ users }}</div> -->

</template>

<script>
import axios from 'axios';
import { onMounted } from 'vue';



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


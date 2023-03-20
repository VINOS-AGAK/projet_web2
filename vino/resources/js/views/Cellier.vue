<template>
    <!-- <headerView /> -->
          <h1 class="accueil-titre">cellierzzzzzzzz.vue</h1>
            <!-- <div id="users">{{ users }}</div> -->

</template>

<script>
import axios from 'axios';
import { onMounted } from 'vue';



export default {
    data(){
        return{
            users: [],
        };
    },
    mounted(){this.fetchUsers()},
    methods: {
        fetchUsers(){
            axios.get("api/user")
            .then((response)=>{
                if (response.status >= 200 && response.status < 300){

                    return this.users = response.data.data;
                }else{
                    console.log ("oopsy poopsy")
                }                
                // console.log(this.users)              
            })
            .catch((error) => console.log(error))
        }
    }
}
</script>


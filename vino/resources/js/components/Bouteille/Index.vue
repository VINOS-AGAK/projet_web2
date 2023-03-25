<template>
    <div class="product-grid">
        <div class="product-card" v-for="bouteille in mesBouteilles" :key="bouteille.id">
            <img :src="bouteille.image" alt="Product 1">
            <h3>{{ bouteille.nom }}</h3>
            <p>{{ bouteille.description }}</p>
            <p>{{ bouteille.pays }}</p>
            <p>{{ bouteille.format }}</p>
            <router-link :to="{ name: 'bouteille.edit', params: { id: bouteille.id } }">
                Modifier
            </router-link>
            <br>
            <a href="#" @click.prevent="deleteBouteille(bouteille.id)">Supprimer</a>
        </div>
    </div>
</template>
    
<script>
import useBouteille from '../../composables/bouteille'
import { onMounted } from 'vue'

export default {

    setup() {
        const { mesBouteilles, getMesBouteilles,deleteBouteille } = useBouteille()
        onMounted(getMesBouteilles)
        const axios = require('axios');

    //     const deleteBouteille = async (id) => {
    //   try {
    //     await axios.delete(`api/bouteille/`+id)
    //     await getMesBouteilles()
    //   } catch (error) {
    //     console.error(error)
    //   }
    // }
        return {
            mesBouteilles,
            getMesBouteilles,
            deleteBouteille,

        }
    }
}
</script>
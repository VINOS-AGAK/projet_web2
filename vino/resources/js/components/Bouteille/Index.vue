<template>
    Hello I'm Bouteille component Index

    <!-- <div class="product-grid">
        <div class="product-card" v-for="bouteille in catalogue" :key="bouteille.id">
            <img :src="bouteille.image" alt="Product 1">
            <h3>{{ bouteille.nom }}</h3>
            <p>{{ bouteille.description }}</p>
            <p>{{ bouteille.pays }}</p>
            <p>{{ bouteille.format }}</p>
            <router-link :to="{ name: 'catalogue.edit', params: { id: bouteille.id } }">
                Modifier
            </router-link>
            <br>
            <a href="#" @click.prevent="deleteCatalogue(bouteille.id)">Supprimer</a>
        </div>
    </div> -->
</template>
    
<script>

import useBouteille from '../../composables/bouteille'
import { onMounted } from 'vue'

export default {

    setup() {
        const { mesBouteilles, getMesBouteilles } = useBouteille()
        onMounted(getMesBouteilles)

        return {
            mesBouteilles,
            getMesBouteilles

        }
    }
}
</script>
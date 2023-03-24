<template>
    <div>
        Hello I'm Cellier component Index

        <router-link :to="{ name: 'bouteille.index', params: { id: unCellier.id } }">
            <div class="product-card">
                <p>Cellier: {{ unCellier.nom }}</p>
                <p>Description: {{ unCellier.description }}</p>
                <h5>Voire mes bouteilles</h5>
            </div>
            <br>
        </router-link>

        <!-- <a href="#" @click.prevent="deleteCatalogue(bouteille.id)">Supprimer</a> -->

        <!-- Pour pluseur cellier TODO: ( Later ) -->
        <!-- <div class="product-card" v-for="uneCellier in mesCellier" :key="uneCellier.id">
            <p>Nom: {{ uneCellier.nom }}</p>
            <p>Description : {{ uneCellier.description }}</p>
        </div> -->
    </div>
</template>

<script>

import useCellier from '../../composables/cellier';
import { onMounted } from 'vue';

export default {

    setup() {
        const { unCellier, getOneCellier } = useCellier()
        onMounted(getOneCellier)
        return {
            unCellier,
        }
    }

    // setup() {
    //     const { mesCellier, getMesCellier } = useCellier()
    //     onMounted(getMesCellier)
    //     return {
    //         mesCellier,
    //     }
    // }
}

</script>
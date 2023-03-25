<template>
    <div>
        <div>Cellier component Index</div>
        <br>
        <div class="">
            <router-link :to="{ name: 'cellier.create' }" class="btn">Crée un nouveau cellier</router-link>
        </div>

        <div class="product-card" v-for="unCellier in mesCellier" :key="unCellier.id">
            <router-link :to="{ name: 'bouteille.index', params: { id: unCellier.id } }">
                <p>Nom: {{ unCellier.nom }}</p>
                <p>Description : {{ unCellier.description }}</p>
            </router-link>
        </div>
        <!-- TODO: -->
        <!-- <div class="card-footer">
            <router-link :to="{ name: 'cellier.edit', params: { id: selectedProduct.id } }">
                Modifier
            </router-link>
            <br>
            <a href="#" @click.prevent="deleteCellier(selectedProduct.id)" class="btn">Supprimer</a>
        </div> -->
    </div>
</template>

<script>

import useCellier from '../../composables/cellier';
import { onMounted } from 'vue';

export default {

    setup() {
        const { mesCellier, getMesCellier } = useCellier()
        onMounted(getMesCellier)
        return {
            mesCellier,
        }
    }
}

</script>
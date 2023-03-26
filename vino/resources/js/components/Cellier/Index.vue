<template>
    <!-- Pour pluseur cellier TODO: ( Later ) -->
    <section>
    <div class="ajouter-cellier">
        <a href="#" class="ajouter-cellier__bouton">Ajouter un nouveau cellier</a>
    </div>
    <h2 class="liste__titre">Mes cellier</h2>
    <article class="container">
        <div class="card" v-for="unCellier in mesCellier" :key="unCellier.id">
            <router-link :to="{ name: 'bouteille.index', params: { id: unCellier.id } }">
                <p>Nom: {{ unCellier.nom }}</p>
                <p>Description : {{ unCellier.description }}</p>
            </router-link>
        </div>
        <div v-if="mesCellier.length === 0">
            <p class="text-danger">Vous n'avez pas de cellier. Voulez-vous en créer un? Cliquez <a href="#">ici</a></p>
        </div>
    </article>
</section>

    <!-- <router-link :to="{ name: 'bouteille.index', params: { id: unCellier.id } }">
        <div class="product-card">
            <p>Cellier: {{ unCellier.nom }}</p>
            <p>Description: {{ unCellier.description }}</p>
            <h5>Voire mes bouteilles</h5>
        </div>
        <br>
    </router-link> -->

    <!-- <a href="#" @click.prevent="deleteCatalogue(bouteille.id)">Supprimer</a> -->

</template>

<script>

import useCellier from '../../composables/cellier';
import { onMounted } from 'vue';

export default {

    // setup() {
    //     const { unCellier, getOneCellier } = useCellier()
    //     onMounted(getOneCellier)
    //     return {
    //         unCellier,
    //     }
    // }

    setup() {
        const { mesCellier, getMesCellier } = useCellier()
        onMounted(getMesCellier)
        return {
            mesCellier,
        }
    }
}

</script>
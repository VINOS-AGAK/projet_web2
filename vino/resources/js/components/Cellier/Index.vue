<template>
    <section class="liste-container">

        <div class="">
            <router-link :to="{ name: 'cellier.create' }" class="">Crée un nouveau cellier</router-link>
        </div>
        <article class="container">
            <div class="card" v-for="unCellier in mesCellier" :key="unCellier.id">
                <div class="">
                    <section class="card-cellier">
                        <router-link :to="{ name: 'bouteille.index', params: { id: unCellier.id } }">
                                <p>Nom: {{ unCellier.nom }}</p>
                                <p>Description : {{ unCellier.description }}</p>
                        </router-link>
                        <a href="#" @click.prevent="deleteCellier(selectedProduct)" class="btn-submit">Supprimer</a>
                    </section>
                </div>
            </div>
        </article>
    </section>
</template>

<script>

import useCellier from '../../composables/cellier';
import { onMounted, ref, computed } from 'vue'

export default {

    setup() {
        const { mesCellier, getMesCellier, deleteCellier } = useCellier()
        const selectedProduct = ref(null)
        const searchTerm = ref('')
        onMounted(getMesCellier)

        const selectProduct = () => {
            if (searchTerm.value !== '' && selectedProduct.value === null) {
                selectedProduct = unCellier.id
            }
        }

        return {
            mesCellier,
            getMesCellier,
            deleteCellier,
            selectedProduct,
            selectProduct
        }
    }
}

</script>
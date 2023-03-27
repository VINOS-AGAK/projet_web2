<template>
    <section class="liste-container">

        <!-- Ajouter un nouveau cellier -->
        <div class="ajouter-cellier">
            <router-link :to="{ name: 'cellier.create' }" class="ajouter-cellier__bouton">Ajouter un nouveau
                cellier</router-link>
        </div>

        <!-- La listes des cellier -->
        <article class="container">
            <div class="card" v-for="unCellier in mesCellier" :key="unCellier.id">

                <div class="card-body cellier__card-body">
                    <img src="https://media.istockphoto.com/id/471642528/ru/%D0%B2%D0%B5%D0%BA%D1%82%D0%BE%D1%80%D0%BD%D0%B0%D1%8F/%D0%B0%D0%BA%D0%B2%D0%B0%D1%80%D0%B5%D0%BB%D1%8C%D0%BD%D1%8B%D0%B5-%D0%B1%D0%BE%D0%BA%D0%B0%D0%BB-%D0%BA%D1%80%D0%B0%D1%81%D0%BD%D0%BE%D0%B3%D0%BE-%D0%B2%D0%B8%D0%BD%D0%B0.jpg?s=1024x1024&w=is&k=20&c=sb0epl26InB9CDERl8RjaSRaqV8m_XDcA8qKJDw0VsE="
                        alt="img-bouteille">
                    <div class="cellier-info">
                        <div class="card-info-title">
                            <h3 class="cellier__card-title"><router-link
                                    :to="{ name: 'bouteille.index', params: { id: unCellier.id } }">{{ unCellier.nom
                                    }}</router-link></h3>
                        </div>
                        <div class="card-info-client">
                            <p class="card-subtitle">{{ unCellier.description }}</p>
                        </div>

                        <div class="card-footer">
                            <router-link class="card-btn_modif " :to="{ name: 'cellier.edit', params: { id: unCellier.id }}">Modifier</router-link>
                            <button class="card-btn_supp deleteModalBtn" @click.prevent="deleteCellier(unCellier.id)">X</button>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="mesCellier.length === 0">
                <p class="text-danger">Vous n'avez pas de cellier. Voulez-vous en créer un? Cliquez <router-link
                        :to="{ name: 'cellier.create' }">ici</router-link></p>
            </div>

        </article>
    </section>
</template>

<script>

import useCellier from '../../composables/cellier';
import { onMounted, ref } from 'vue'

export default {

    setup() {
        const { mesCellier, getCelliers, deleteCellier } = useCellier()
        const selectedProduct = ref(null)
        const searchTerm = ref('')
        onMounted(getCelliers)

        const selectProduct = () => {
            if (searchTerm.value !== '' && selectedProduct.value === null) {
                selectedProduct = unCellier.id
            }
        }

        return {
            mesCellier,
            getCelliers,
            deleteCellier,
            selectedProduct,
            selectProduct
        }
    }
}

</script>
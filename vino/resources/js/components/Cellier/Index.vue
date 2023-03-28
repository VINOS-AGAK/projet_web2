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
            <router-link
                                    :to="{ name: 'bouteille.index', params: { id: unCellier.id } }">
                <div class="card-body cellier__card-body">
                    <img src="https://as2.ftcdn.net/v2/jpg/00/97/95/11/1000_F_97951154_mc0qsUpZBWWNm1TjSehhwCQJ4lBiRGm4.jpg"  alt="img-bouteille">
                    <div class="cellier-info">
                        <div class="card-info-title">
                            <h3 class="cellier__card-title">{{ unCellier.nom
                                    }}</h3>
                        <p class="card-subtitle">{{ unCellier.description }}</p>
                        </div>
                        

                        <div class="card-info-client">
                            <p class="card-subtitle">Quantite bouteille dans cellier</p>
                        </div>

                        
                    </div>
                </div>
            </router-link>
            <div class="card-footer">
                            <router-link class="card-btn_modif " :to="{ name: 'cellier.edit', params: { id: unCellier.id }}">Modifier</router-link>
                            <button class="card-btn_supp deleteModalBtn" @click.prevent="deleteCellier(unCellier.id)">-</button>
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
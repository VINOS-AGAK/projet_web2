<template>
    <!-- Pour pluseur cellier TODO: ( Later ) -->
    <section class="liste-container">

        <div class="ajouter-cellier">
            <router-link :to="{name: 'cellier.create'}" class="ajouter-cellier__bouton">Ajouter un nouveau cellier</router-link>
        </div>

        <article class="container">
            <div class="card" v-for="unCellier in mesCellier" :key="unCellier.id">
        
                <div class="card-body cellier__card-body">
                    <img src="https://as2.ftcdn.net/v2/jpg/00/97/95/11/1000_F_97951154_mc0qsUpZBWWNm1TjSehhwCQJ4lBiRGm4.jpg"  alt="img-bouteille">
                    <div class="cellier-info">
                        <div class="card-info-title">
                            <h3 class="cellier__card-title"><router-link :to="{ name: 'bouteille.index', params: { id: unCellier.id } }">{{ unCellier.nom }}</router-link></h3>
                        </div>
                        <div class="card-info-client">
                            <p class="card-subtitle">{{ unCellier.description }}</p>
                        </div>
                        
                        <div class="card-footer">
                             <!-- TODO: -->
                             <!-- <router-link :to="{ name: 'cellier.edit', params: { id: selectedProduct.id } }">
                                Modifier
                                </router-link> -->
                              <router-link  class="card-btn_modif " value="" :to="{}">Modifier</router-link>   
                              <button  class="card-btn_supp deleteModalBtn" value="" >-</button>   
                        </div>
                    </div>
                </div>
            </div>
            
            <div v-if="mesCellier.length === 0">
            <p class="text-danger">Vous n'avez pas de cellier. Voulez-vous en créer un? Cliquez  <router-link :to="{name: 'cellier.create'}" >ici</router-link></p>
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
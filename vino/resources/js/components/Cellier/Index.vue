<template>
    <section class="liste-container">

        <!-- Ajouter un nouveau cellier -->
        <div class="ajouter-cellier">
            <router-link :to="{ name: 'cellier.create' }" class="ajouter-cellier__bouton">Ajouter un nouveau cellier
            </router-link>
        </div>
        <!-- La listes des cellier -->
        <article class="container">
            <div class="card" v-for="unCellier in mesCellier" :key="unCellier.id">
                <router-link :to="{ name: 'bouteille.index', params: { id: unCellier.id } }">
                    <div class="card-body cellier__card-body">

                        <IconContainer>
                            <template #icon>
                                <IconCellier/>
                            </template>
                        </IconContainer>

                        <div class="cellier-info">

                            <div class="card-info-title">
                                <h3 class="cellier__card-title">{{ unCellier.nom}}</h3>
                                <p class="card-subtitle">{{ unCellier.description }}</p>
                            </div>

                                <div class="card-info-client">

                                    <div class="card-icon-container">
                                        <router-link class="" :to="{ name: 'cellier.edit', params: { id: unCellier.id }}">
                                            <IconContainer>
                                                <template #icon>
                                                    <IconModifier/>
                                                </template>
                                            </IconContainer>
                                        </router-link>
        
                                        <button class="deleteModalBtn" @click.prevent="deleteCellier(unCellier.id)">
                                            <IconContainer>
                                                <template #icon>
                                                    <IconSupprimer/>
                                                </template>
                                            </IconContainer>
                                        </button>
                                    </div>

                                </div>
                                

                        </div>
                    </div>
                </router-link>
            </div>

            <div v-if="mesCellier.length === 0">
                <p class="text-danger">Vous n'avez pas de cellier. Voulez-vous en créer un Cliquez     
                    <router-link :to="{ name: 'cellier.create' }">ici</router-link>
                </p>
            </div>

        </article>
    </section>
</template>

<script>

// Import des hooks composables et des composants nécessaires pour la gestion des celliers
import { onMounted, ref } from 'vue';
import useCellier from '../../composables/cellier';
import IconCellier from '../icons/IconCellier.vue';
import IconSupprimer from '../icons/IconSupprimer.vue';
import IconModifier from '../icons/IconModifier.vue';
import IconContainer from "../IconContainer.vue";


export default {

    setup() {
        // Récupération des fonctions et des données nécessaires pour la gestion des celliers grâce au hook "useCellier"
        const { mesCellier, getCelliers, deleteCellier} = useCellier()
        const selectedProduct = ref(null)
        const searchTerm = ref('')
        // Lorsque le composant est monté, récupération des celliers grâce à la fonction "getCelliers"
        onMounted(getCelliers)
        

        // Sélection d'un cellier dans la liste
        const selectProduct = () => {
            if (searchTerm.value !== '' && selectedProduct.value === null) {
                selectedProduct = unCellier.id
            }
        }

        // Retourne les données nécessaires pour la gestion des celliers et leur affichage
        return {
            mesCellier,
            getCelliers,
            deleteCellier,
            selectedProduct,
            selectProduct
            
        }
    },

    // Définition des composants utilisés dans ce composant
    components: {
    "IconContainer": IconContainer,
    "IconCellier": IconCellier,
    "IconSupprimer": IconSupprimer,
    "IconModifier": IconModifier,
}

}

</script>
<template>
    <main class="">
        <div class="container-form">
            <h3 class="text-form">Editer mon cellier</h3>

            <!-- FORM Editer d'un cellier -->
            <form @submit.prevent='updateCellier(showCellier)'>

                <div class="container-form">

                    <!-- Nom -->
                    <label class="text-form" for="cellierNom">Nom du cellier</label>
                    <input class="input" v-model="showCellier.nom" type="text" name="cellierNom" id="cellierNom">
                    <div class="text-red">
                        <div v-for="message in validationErrors?.nom">{{ message }}</div>
                    </div>

                    <!-- Description -->
                    <label class="text-form" for="cellierDescription">Description du cellier</label>
                    <input class="input" v-model="showCellier.description" type="text" name="cellierDescription" id="cellierDescription">
                    <div class="text-red">
                        <div v-for="message in validationErrors?.description">{{ message }}</div>
                    </div>
                    
                    <!-- button -->
                    <button :disabled="isLoading" class="btn-submit">
                        <div v-show="isLoading" class=""></div>
                        <span v-if="isLoading">Processing...</span>
                        <span v-else>Sauvegarder les changements</span>
                    </button>

                </div>
            </form>
        </div>
    </main>
</template>
    
<script>
// Import des hooks composables nécessaires pour la gestion du cellier
import { onMounted, reactive } from "vue";
import { useRoute } from 'vue-router';
import useCellier from "../../composables/cellier.js";

export default {
    setup() {
        // Récupération des fonctions et des données nécessaires pour la gestion d'un cellier grâce au hook "useCellier"
        const { showCellier, showOneCellier, updateCellier, validationErrors, isLoading} = useCellier()
        // Récupération des informations de la route en cours grâce au hook "useRoute"
        const route = useRoute()
        showOneCellier()

        // Lorsque le composant est monté, récupération du cellier correspondant à l'ID de la route en cours grâce à la fonction "getOneCellier" et affichage de ses informations dans la console
        onMounted(() => {
            showOneCellier(route.params.id)
        })

        // Retourne les données nécessaires pour l'édition du cellier
        return { showCellier, validationErrors, isLoading, updateCellier }
    }
}
</script>
    
    
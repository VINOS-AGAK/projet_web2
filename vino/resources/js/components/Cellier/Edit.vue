<template>
    <main class="">
        <div class="container-form">
            <h3 class="text-form">Editer mon cellier</h3>

            <!-- FORM Editer d'un cellier -->
            <form @submit.prevent='updateCellier(oneCellier)'>

                <div class="container-form">

                    <!-- Nom -->
                    <label class="text-form" for="cellierNom">Nom du cellier</label>
                    <input class="input" v-model="oneCellier.nom" type="text" name="cellierNom" id="cellierNom">
                    <div class="text-red">
                        <div v-for="message in validationErrors?.nom">{{ message }}</div>
                    </div>

                    <!-- Description -->
                    <label class="text-form" for="cellierDescription">Description du cellier</label>
                    <input class="input" v-model="oneCellier.description" type="text" name="cellierDescription" id="cellierDescription">
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
import { onMounted, reactive } from "vue";
import { useRoute } from 'vue-router';
import useCellier from "../../composables/cellier.js";

export default {
    setup() {
        const { oneCellier, getOneCellier, updateCellier, validationErrors, isLoading } = useCellier()
        const route = useRoute()

        onMounted(() => {
            getOneCellier(route.params.id)
            console.log('une Cellier dans edit');
            console.log(oneCellier);
        })

        return { oneCellier, validationErrors, isLoading, updateCellier }
    }
}
</script>
    
    
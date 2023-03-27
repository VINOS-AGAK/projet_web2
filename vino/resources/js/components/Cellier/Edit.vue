<template>
    <form @submit.prevent='updateCellier(oneCellier)'>

        <div class="container-form">
            <div class="header-form">
                <h3>Ajoute un bouteille</h3>
            </div>


            <!-- Nom -->
            <label class="text-form" for="cellierNom">Nom du cellier</label>
            <input class="input" v-model="cellier.nom" type="text" name="cellierNom" id="cellierNom">

            <!-- Description -->
            <label class="text-form" for="cellierNom">Description du cellier</label>
            <input class="input" v-model="cellier.description" type="text" name="cellierNom" id="cellierNom">




            <p class="text-form">Nom:</p>
            <input v-model="oneCellier.nom" id="cellier-nom" type="text" class="input">
            <div class="text-red">
                <div v-for="message in validationErrors?.nom">{{ message }}</div>
            </div>
            <button :disabled="isLoading" class="btn-submit">
                <div v-show="isLoading" class=""></div>
                <span v-if="isLoading">Processing...</span>
                <span v-else>Save</span>
            </button>



        </div>
    </form>
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
    
    
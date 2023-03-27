<template>
    <main class="">
        <div class="container-form">
            <h3 class="text-form">Mon Nouveau cellier</h3>

            <!-- FORM Creation d'un cellier -->
            <form @submit.prevent="storeCellier(cellier)">

                <!-- User id -->
                <input class="number" v-model="cellier.user_id" type="hidden" name="cellierUserId">

                <!-- Nom -->
                <label class="text-form" for="cellierNom">Nom du cellier</label>
                <input class="input" v-model="cellier.nom" type="text" name="cellierNom" id="cellierNom">
                <div class="text-red">
                    <div v-for="message in validationErrors?.nom">{{ message }}</div>
                </div>

                <!-- Description -->
                <label class="text-form" for="cellierDescription">Description du cellier</label>
                <input class="input" v-model="cellier.description" type="text" name="cellierDescription"
                    id="cellierDescription">
                <div class="text-red">
                    <div v-for="message in validationErrors?.description">{{ message }}</div>
                </div>

                <!-- button -->
                <button :disabled="isLoading" class="btn-submit">
                    <div v-show="isLoading"></div>
                    <span v-if="isLoading">Processing...</span>
                    <span v-else>sauvegarder</span>
                </button>
            </form>
        </div>
    </main>
</template>

<script>

import useCellier from '../../composables/cellier';
import useAuth from "../../composables/auth";
import { reactive } from "vue";

const { user } = useAuth();

export default {

    setup() {
        const cellier = reactive({
            user_id: user.id,
            nom: '',
            description: ''
        })

        const { storeCellier, validationErrors, isLoading } = useCellier()

        return { cellier, storeCellier, validationErrors, isLoading }
    }
}

</script>
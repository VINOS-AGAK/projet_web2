<template>
    <main class="">
        <div class="container-form">
            <p class="text-form">
                <h3>nouveau cellier</h3>
            </p>
            
            <form @submit.prevent="storeCellier(cellier)">
    
            <!-- User id -->
            <input class="number" v-model="cellier.user_id" type="hidden" name="cellierNom" id="cellierNom" >
    
            <!-- Nom -->
            <p class="text-form" for="cellierNom">Nom du cellier</p>
            <input class="input" v-model="cellier.nom" type="text" name="cellierNom" id="cellierNom">
    
            <!-- Description -->
            <p class="text-form" for="cellierNom">Description du cellier</p>
            <input class="input" v-model="cellier.description" type="text" name="cellierNom" id="cellierNom">
    
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
import { onMounted, reactive} from "vue";

const { user } = useAuth();

export default {

        setup() {
            const cellier = reactive ({
                user_id: user.id,
                nom: '',
                description: ''
            })
    
            const { storeCellier, validationErrors, isLoading } = useCellier()
    
            return { cellier, storeCellier, validationErrors, isLoading }
        }
    }

</script>
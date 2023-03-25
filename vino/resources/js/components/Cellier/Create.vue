<template>
    <div>
        <form @submit.prevent="storeCellier(cellier)">

            <!-- User id -->
            <label class="" for="cellierNom">Nom du cellier</label>
            <input class="number" v-model="cellier.user_id" type="hidden" name="cellierNom" id="cellierNom" >

            <!-- Nom -->
            <label class="" for="cellierNom">Nom du cellier</label>
            <input class="number" v-model="cellier.nom" type="text" name="cellierNom" id="cellierNom">
            
            <!-- Description -->
            <label class="" for="cellierNom">Description du cellier</label>
            <input class="number" v-model="cellier.description" type="text" name="cellierNom" id="cellierNom">

            <!-- button -->
            <button :disabled="isLoading" class="btn-submit">
                <div v-show="isLoading"></div>
                <span v-if="isLoading">Processing...</span>
                <span v-else>Save</span>
            </button>

        </form>
    </div>
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
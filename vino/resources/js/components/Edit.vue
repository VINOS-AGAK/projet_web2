<template>
    <form @submit.prevent='updateCatalogue(oneCatalogue)'>

      <div class="container-form">
        <div class="header-form">
             <h3>Ajoute un bouteille</h3>
        </div>

          <p class="text-form">Type:</p>
          <input v-model="oneCatalogue.vino__type_id" id="catalogue-type" type="number" min="1" max="2" class="number">
          <div class="text-red">
            <div v-for="message in validationErrors?.vino__type_id">{{ message }}</div>
          </div>

  
          <p class="text-form">Nom:</p>
          <input v-model="oneCatalogue.nom" id="catalogue-nom" type="text" class="input">
          <div class="text-red">
              <div v-for="message in validationErrors?.nom">{{ message }}</div>
          </div>

          <p class="text-form">Image:</p>
          <input v-model="oneCatalogue.image" id="catalogue-image" type="text" class="input">
          <div class="text-red">
              <div v-for="message in validationErrors?.image">{{ message }}</div>
          </div>

    
          <p class="text-form">Code SAQ:</p>
          <input v-model="oneCatalogue.code_saq" id="catalogue-code_saq" type="text" class="input">
          <div class="text-red">
              <div v-for="message in validationErrors?.code_saq">{{ message }}</div>
          </div>

  
          <p class="text-form">Pays:</p>
          <input v-model="oneCatalogue.pays" id="catalogue-pays" type="text" class="input">
          <div class="text-red">
              <div v-for="message in validationErrors?.pays">{{ message }}</div>
          </div>

    
          <p class="text-form">Description:</p>
          <input v-model="oneCatalogue.description" id="catalogue-description" type="text" class="input">
          <div class="text-red">
              <div v-for="message in validationErrors?.description">{{ message }}</div>
          </div>

          <p class="text-form">Prix SAQ:</p>
          <input v-model="oneCatalogue.prix_saq" id="catalogue-prix_saq" type="text" class="input">
          <div class="text-red">
              <div v-for="message in validationErrors?.prix_saq">{{ message }}</div>
          </div>
    
          <p class="text-form">URL SAQ:</p>
          <input v-model="oneCatalogue.url_saq" id="catalogue-url_saq" type="text" class="input">
          <div class="text-red">
              <div v-for="message in validationErrors?.url_saq">{{ message }}</div>
          </div>

          <p class="text-form">URL Image:</p>
          <input v-model="oneCatalogue.url_img" id="catalogue-url_img" type="text" class="input">
          <div class="text-red">
              <div v-for="message in validationErrors?.url_img">{{ message }}</div>
          </div>

  
          <p class="text-form">Format:</p>
          <input v-model="oneCatalogue.format" id="catalogue-format" type="text" class="input">
          <div class="text-red">
              <div v-for="message in validationErrors?.format">{{ message }}</div>
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
    import { onMounted, reactive} from "vue";
    import { useRoute } from 'vue-router';
    import useCatalogue from "../composables/catalogue.js";
    
    export default {
        setup() {
            const { oneCatalogue, getOneCatalogue, updateCatalogue, validationErrors, isLoading } = useCatalogue()
            const route = useRoute()

            onMounted(()=> {
                getOneCatalogue(route.params.id)
                console.log('une bouteille du catalogue dans edit');
                console.log(oneCatalogue);
            })
    
            return { oneCatalogue, validationErrors, isLoading, updateCatalogue }
        }
    }
    </script>
    
    
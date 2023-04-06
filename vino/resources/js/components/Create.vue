<template>
  <main>

    <div class="container-form">
      <div class="ajouter-cellier">
             <h3>Ajoute un bouteille</h3>
     </div>
      <form @submit.prevent='storeCatalogue(catalogue)'>

        <p class="text-form">Type:</p>
        <input v-model="catalogue.vino__type_id" id="catalogue-type" type="number" min="1" max="2" class="number">
        <div class="text-red">
          <div v-for="message in validationErrors?.vino__type_id">{{ message }}</div>
        </div>

        <p class="text-form">Nom:</p>
        <input v-model="catalogue.nom" id="catalogue-nom" type="text" class="name">
        <div class="text-red">
            <div v-for="message in validationErrors?.nom">{{ message }}</div>
        </div>

        <p class="text-form">Image:</p>
        <input v-model="catalogue.image" id="catalogue-image" type="text" class="name">
        <div class="text-red">
            <div v-for="message in validationErrors?.image">{{ message }}</div>
        </div>


        <p class="text-form">Code SAQ:</p>
        <input v-model="catalogue.code_saq" id="catalogue-code_saq" type="text" class="name">
        <div class="text-red">
          <div v-for="message in validationErrors?.code_saq">{{ message }}</div>
        </div>

        <p class="text-form">Pays:</p>
        <input v-model="catalogue.pays" id="catalogue-pays" type="text" class="name">
        <div class="text-red">
            <div v-for="message in validationErrors?.pays">{{ message }}</div>
        </div>

        <p class="text-form">Description:</p>
        <input v-model="catalogue.description" id="catalogue-description" type="text" class="name">
        <div class="text-red">
            <div v-for="message in validationErrors?.description">{{ message }}</div>
        </div>


        <p class="text-form">Prix SAQ:</p>
        <input v-model="catalogue.prix_saq" id="catalogue-prix_saq" type="text" class="name">
        <div class="text-red">
            <div v-for="message in validationErrors?.prix_saq">{{ message }}</div>
        </div>

        <p class="text-form">URL SAQ</p>
        <input v-model="catalogue.url_saq" id="catalogue-url_saq" type="text" class="name">
        <div class="text-red">
            <div v-for="message in validationErrors?.url_saq">{{ message }}</div>
        </div>

        <p class="text-form">URL Image</p>
        <input v-model="catalogue.url_img" id="catalogue-url_img" type="text" class="name">
        <div class="text-red">
            <div v-for="message in validationErrors?.url_img">{{ message }}</div>
        </div>


        <p class="text-form">Format:</p>
        <input v-model="catalogue.format" id="catalogue-format" type="text" class="name">
        <div class="text-red">
            <div v-for="message in validationErrors?.format">{{ message }}</div>
        </div>

        <button :disabled="isLoading" class="btn-submit">
            <div v-show="isLoading"></div>
            <span v-if="isLoading">Processing...</span>
            <span v-else>Save</span>
        </button>

      </form>

    </div>
    
  </main>
   
</template>
    
    <script>
    // Importation des modules
    import { onMounted, reactive} from "vue";
    import useCatalogue from "../composables/catalogue.js";
    
    export default {
        setup() {
            // Création d'un objet réactif "catalogue"
            const catalogue = reactive ({
                nom: '',
                image: '',
                code_saq: '',
                pays: '',
                description: '',
                prix_saq: '',
                url_saq: '',
                url_img: '',
                format: '',
                vino__type_id: '',
            })
    
            // Utilisation du module composable "catalogue"
            const { storeCatalogue, validationErrors, isLoading } = useCatalogue()
    
            // Retourne les variables et fonctions nécessaires
            return { catalogue, storeCatalogue, validationErrors, isLoading }
        }
    }
    </script>
    
    
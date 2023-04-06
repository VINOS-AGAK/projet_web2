<template>

  <header class="site-header">
    <!-- Barre de recherche -->
    <form class="search" action="#" method="GET" @submit.prevent="selectProduct">
        <input type="search" v-model="searchTerm" autocomplete="off" list="catalogue-names" placeholder="rechercher un vin">
        <!-- Bouton de recherche -->
        <button type="submit" @click="clearSearch">
          <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
            <path d="M19.3,5.7l-0.7-0.7L12,11.3L5.4,4.7L4.7,5.4L11.3,12L4.7,18.6l0.7,0.7L12,12.7l6.6,6.6l0.7-0.7L12.7,12L19.3,5.7z"/>
          </svg>
        </button>
    </form>
  </header>

  <div class="liste-container">

    <!-- Liste déroulante -->
    <datalist  id="catalogue-names">
      <option v-for="bouteille in filteredCatalogue.slice(0, 6)" :value="bouteille.nom">{{ bouteille.nom }}</option>
    </datalist>

    <section>
      <!-- Carte de produit sélectionné -->
      <article v-if="selectedProduct" class="catalogue__card">
        <div class="catalogue__card-body">
          <img :src="selectedProduct.image" alt="img-bouteille">
          <picture class="modal"><img :src="selectedProduct.image" alt="img-bouteille"></picture>
          <div class="catalogue__card-info">

            <div class="card-info-title">
              <h3 class="card-title">{{ selectedProduct.nom }}</h3>
              <p class="card-subtitle">{{ selectedProduct.description }} {{ selectedProduct.format }}</p>
              <p class="card-subtitle">{{ selectedProduct.pays }}</p>
            </div>

            <div class="card-info-client">
              <p class="catalogue__card-count">{{ selectedProduct.prix_saq }}$</p>
          
                <form @submit.prevent="storeBouteille(bouteille)" >

                <div class="">
                  <!-- Menu déroulant pour choisir le cellier -->
                  <label for="selectField">Choisir Cellier</label>
                  <select v-model="bouteille.vino__cellier_id" name="vino__cellier_id" id="selectField" class="">
                    <option value="" disabled>--Choisissez un cellier--</option>
                    <option  v-for="cellier in mesCellier" :value="cellier.id" >{{ cellier.nom }}</option>
                  </select>
                </div>

                <div>
                  <!-- Champ de quantité -->
                  <label for="quantityField">Quantite</label>
                  <input v-model="bouteille.quantite" name="quantite" type="number" id="quantityField" class="" min="1" max="100">
                </div>

                <div>
                  <!-- Case à cocher pour confirmer l'ajout -->
                  <label for="ajouter">Confirmation</label>
                  <input v-model="bouteille.vino__bouteille_id" type="radio" name="vino__bouteille_id" :value="selectedProduct.id" id="ajouter">
                </div>

                <button type="submit" class="btn">Ajouter</button>

              </form>

              
            </div>
          </div>
        </div>
      </article>
    </section>
    
    <!-- Section pour ajouter nouvelle bouteille -->
    <section   v-show="!selectedProduct" class="container-form">
      <div class="ajouter-cellier">
        <button @click="toggleForm" class="ajouter-cellier__bouton">Ajouter votre vin</button>
      </div>
    

          <form v-show="showForm" @submit.prevent='storeCatalogueAndBouteille(newCatalogue, bouteille)' class="ajouter-nouveau-vino">

            <p class="text-form">Type:</p>
            <input v-model="newCatalogue.vino__type_id" id="catalogue-type" type="number" min="1" max="2" class="number">
            <div class="text-red">
              <div v-for="message in validationErrors?.vino__type_id">{{ message }}</div>
            </div>

            <p class="text-form">Nom:</p>
            <input v-model="newCatalogue.nom" id="catalogue-nom" type="text" class="name">
            <div class="text-red">
                <div v-for="message in validationErrors?.nom">{{ message }}</div>
            </div>

            <p class="text-form">Image:</p>
            <input v-model="newCatalogue.image" id="catalogue-image" type="text" class="name">
            <div class="text-red">
                <div v-for="message in validationErrors?.image">{{ message }}</div>
            </div>


            <p class="text-form">Code SAQ:</p>
            <input v-model="newCatalogue.code_saq" id="catalogue-code_saq" type="text" class="name">
            <div class="text-red">
              <div v-for="message in validationErrors?.code_saq">{{ message }}</div>
            </div>

            <p class="text-form">Pays:</p>
            <input v-model="newCatalogue.pays" id="catalogue-pays" type="text" class="name">
            <div class="text-red">
                <div v-for="message in validationErrors?.pays">{{ message }}</div>
            </div>

            <p class="text-form">Description:</p>
            <input v-model="newCatalogue.description" id="catalogue-description" type="text" class="name">
            <div class="text-red">
                <div v-for="message in validationErrors?.description">{{ message }}</div>
            </div>


            <p class="text-form">Prix SAQ:</p>
            <input v-model="newCatalogue.prix_saq" id="catalogue-prix_saq" type="text" class="name">
            <div class="text-red">
                <div v-for="message in validationErrors?.prix_saq">{{ message }}</div>
            </div>

            <p class="text-form">URL SAQ</p>
            <input v-model="newCatalogue.url_saq" id="catalogue-url_saq" type="text" class="name">
            <div class="text-red">
                <div v-for="message in validationErrors?.url_saq">{{ message }}</div>
            </div>

            <p class="text-form">URL Image</p>
            <input v-model="newCatalogue.url_img" id="catalogue-url_img" type="text" class="name">
            <div class="text-red">
                <div v-for="message in validationErrors?.url_img">{{ message }}</div>
            </div>


            <p class="text-form">Format:</p>
            <input v-model="newCatalogue.format" id="catalogue-format" type="text" class="name">
            <div class="text-red">
                <div v-for="message in validationErrors?.format">{{ message }}</div>
            </div>

             <!-- Bouteille fields -->
            <div class="">
              <p class="text-form">Choisir Cellier:</p>
              <select v-model="bouteille.vino__cellier_id" name="vino__cellier_id" id="selectField" class="name">
                <option value="" disabled>--Choisissez un cellier--</option>
                <option v-for="cellier in mesCellier" :value="cellier.id">{{ cellier.nom }}</option>
              </select>
            </div>
            <div>
              <p class="text-form">Quantite</p>
              <input v-model="bouteille.quantite" name="quantite" type="number" id="quantityField" class="name" min="1" max="100" >
            </div>
            <div>
              <p class="text-form">Confirmation</p>
              <input v-model="bouteille.vino__bouteille_id" type="radio" name="vino__bouteille_id" :value="bouteille.vino__bouteille_id" id="ajouter">
            </div>

            <button :disabled="isLoading" class="btn-submit">
                <div v-show="isLoading"></div>
                <span v-if="isLoading">Processing...</span>
                <span v-else>Save</span>
            </button>

          </form>
    </section>
  </div>
</template> 


<script>

  // Import des composables nécessaires
  import useCatalogue from '../composables/catalogue'
  import useCellier from '../composables/cellier'
  import useBouteille from '../composables/bouteille'
  import { onMounted, ref, computed, watch, reactive } from 'vue'
  
  
  export default {
    setup() {
      // Utilisation des composables pour récupérer les données nécessaires
      const { catalogue, storeCatalogue, getCatalogue, deleteCatalogue, isLoading, validationErrors } = useCatalogue()
      const { mesCellier, getCelliers } = useCellier()
      const { storeBouteille } = useBouteille()
      // Référence aux termes de recherche et produit sélectionné
      const searchTerm = ref('')
      const selectedProduct = ref(null)
      // Création d'un objet réactif "catalogue"
      const newCatalogue = reactive ({
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

      const showForm = ref(false); // Create a ref to control the form visibility

    const toggleForm = () => {
      showForm.value = !showForm.value; // Toggle the form visibility when the button is clicked
    };
      // Appel à la fonction de récupération de catalogue et de celliers après la création de la vue
      onMounted(getCatalogue)
      onMounted(getCelliers)
  
      // Création d'un tableau filtré en fonction du terme de recherche
      const filteredCatalogue = computed(() => {
        if (searchTerm.value.length < 2) {
          return []
        }
        return catalogue.value.filter(bouteille => {
          return bouteille.nom.toLowerCase().includes(searchTerm.value.toLowerCase())
        })
      })
      
      // Sélection du produit s'il n'y a pas de produit sélectionné et un terme de recherche existe
      const selectProduct = () => {
        if (searchTerm.value !== '' && selectedProduct.value === null) {
          selectedProduct.value = filteredCatalogue.value[0]
        }
      }

      const storeCatalogueAndBouteille = async (newCatalogue, bouteille) => {
        try {

          const catalogueResponse = await storeCatalogue(newCatalogue);

          console.log(catalogueResponse.data.data.id);

          if (catalogueResponse.data.data.id) {
            bouteille.vino__bouteille_id = catalogueResponse.data.data.id;

          console.log(bouteille);
          }else {
            console.error('error catalogue Response not formated')
          }
          await storeBouteille(bouteille);
        } catch (error) {
          console.error(error);
        }
      };

      
      // Réinitialisation des termes de recherche et du produit sélectionné 
      const clearSearch = () => {
      searchTerm.value = ''
      selectedProduct.value = null
      }

      // Observer les changements dans les termes de recherche et sélectionner le premier produit dans la liste filtrée
      watch(searchTerm, () => {
        if (filteredCatalogue.value.length > 0) {
          selectedProduct.value = filteredCatalogue.value[0]
        } else {
          selectedProduct.value = null
        }
      })


      // Définition d'un objet réactif pour stocker les données de bouteille
      const bouteille = reactive ({
        vino__bouteille_id: '',
        vino__cellier_id: '',
        quantite: '',
      })
      
      // Retour des variables et fonctions nécessaires au composant parent
      return {
        catalogue,
        newCatalogue,
        searchTerm,
        filteredCatalogue,
        selectedProduct,
        bouteille,
        mesCellier,
        showForm,
        toggleForm,
        getCatalogue,
        deleteCatalogue,
        selectProduct,
        storeBouteille,
        storeCatalogue,
        watch,
        clearSearch,
        getCelliers,
        storeCatalogueAndBouteille,
        isLoading,
        validationErrors
      }
    }
  }
</script>  
   
    
   
<template>
  <div class="liste-container">
    <header class="site-header">
      <form class="search" action="#" method="GET" @submit.prevent="selectProduct">
        <input type="search" v-model="searchTerm" autocomplete="off" list="catalogue-names">
        <button type="submit" class="search-button">
          <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
            <path d="m19.45 21.325-6.3-6.3q-.725.55-1.675.85-.95.3-2.05.3-2.775 0-4.712-1.937Q2.775 12.3 2.775 9.525q0-2.775 1.938-4.713Q6.65 2.875 9.425 2.875q2.775 0 4.712 1.937 1.938 1.938 1.938 4.713 0 1.1-.313 2.05-.312.95-.837 1.65l6.325 6.325ZM9.425 13.65q1.725 0 2.925-1.2 1.2-1.2 1.2-2.925 0-1.725-1.2-2.925-1.2-1.2-2.925-1.2Q7.7 5.4 6.5 6.6 5.3 7.8 5.3 9.525q0 1.725 1.2 2.925 1.2 1.2 2.925 1.2Z" />
          </svg>
        </button>
        <button type="submit" class="clear-button" @click="clearSearch">
          <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
            <path d="M19.3,5.7l-0.7-0.7L12,11.3L5.4,4.7L4.7,5.4L11.3,12L4.7,18.6l0.7,0.7L12,12.7l6.6,6.6l0.7-0.7L12.7,12L19.3,5.7z"/>
          </svg>
        </button>
      </form>
    </header>

    <datalist  id="catalogue-names">
      <option v-for="bouteille in filteredCatalogue.slice(0, 6)" :value="bouteille.nom">{{ bouteille.nom }}</option>
    </datalist>

    <section >
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
          

                <form @submit.prevent="storeBouteille(bouteille)">

                  <div class="">
                    <label for="selectField">Choisir Cellier</label>
                    <select v-model="bouteille.vino__cellier_id" name="vino__cellier_id" id="selectField" class="">
                      <option value="" disabled>---Choisissez un cellier---</option>
                      <option  v-for="cellier in mesCellier" :value="cellier.id" >{{ cellier.nom }}</option>
                    </select>
                  </div>

                  <div>
                    <label for="quantityField">Quantite</label>
                    <input v-model="bouteille.quantite" name="quantite" type="number" id="quantityField" class="" min="1" max="100">
                  </div>

                  <div>
                    <label for="ajouter">Confirmation</label>
                    <input v-model="bouteille.vino__bouteille_id" type="radio" name="vino__bouteille_id" :value="selectedProduct.id" id="ajouter">
                  </div>

                  <button type="submit" class="btn">Add to cart</button>

                </form>

                <br>
             
            </div>
          </div>
        </div>
      </article>
    </section>
  </div>

</template> 

 <script>

  import useCatalogue from '../composables/catalogue'
  import useCellier from '../composables/cellier'
  import useBouteille from '../composables/bouteille'
  import { onMounted, ref, computed, watch, reactive } from 'vue'
  
  export default {
    setup() {
      const { catalogue, getCatalogue, deleteCatalogue } = useCatalogue()
      const { mesCellier, getCelliers } = useCellier()
      const { storeBouteille } = useBouteille()
      const searchTerm = ref('')
      const selectedProduct = ref(null)
      onMounted(getCatalogue)
      onMounted(getCelliers)



      const recommandons = computed(() =>{

        return catalogue.value;
      })
  
      const filteredCatalogue = computed(() => {
        if (searchTerm.value.length < 2) {
          return []
        }
        return catalogue.value.filter(bouteille => {
          return bouteille.nom.toLowerCase().includes(searchTerm.value.toLowerCase())
        })
      })
      
      const selectProduct = () => {
        if (searchTerm.value !== '' && selectedProduct.value === null) {
          selectedProduct.value = filteredCatalogue.value[0]
        }
      }

        
      const clearSearch = () => {
      searchTerm.value = ''
      selectedProduct.value = null
      }

      watch(searchTerm, () => {
        if (filteredCatalogue.value.length > 0) {
          selectedProduct.value = filteredCatalogue.value[0]
        } else {
          selectedProduct.value = null
        }
      })

      const bouteille = reactive ({
        vino__bouteille_id: '',
        vino__cellier_id: '',
        quantite: '',
      })
      
  
      return {
        catalogue,
        searchTerm,
        filteredCatalogue,
        selectedProduct,
        recommandons,
        bouteille,
        mesCellier,
        getCatalogue,
        deleteCatalogue,
        selectProduct,
        storeBouteille,
        watch,
        clearSearch,
        getCelliers,
      }
    }
  }
  </script> 
   
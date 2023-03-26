<template>
  <div>
    <header class="site-header">
      <form class="search" action="#" method="GET">
        <input type="search" v-model="searchTerm" autocomplete="off" list="catalogue-names" @change="selectProduct" @input="selectedProduct = null">
        <button type="submit" class="search-button">
          <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
            <path d="m19.45 21.325-6.3-6.3q-.725.55-1.675.85-.95.3-2.05.3-2.775 0-4.712-1.937Q2.775 12.3 2.775 9.525q0-2.775 1.938-4.713Q6.65 2.875 9.425 2.875q2.775 0 4.712 1.937 1.938 1.938 1.938 4.713 0 1.1-.313 2.05-.312.95-.837 1.65l6.325 6.325ZM9.425 13.65q1.725 0 2.925-1.2 1.2-1.2 1.2-2.925 0-1.725-1.2-2.925-1.2-1.2-2.925-1.2Q7.7 5.4 6.5 6.6 5.3 7.8 5.3 9.525q0 1.725 1.2 2.925 1.2 1.2 2.925 1.2Z" />
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
             
                <router-link class="btn" :to="{name: 'catalogue.edit', params:{ id: selectedProduct.id } }">
                  Acheter
                </router-link>
                <br>
                <!-- <a href="#" @click.prevent="deleteCatalogue(selectedProduct.id)" class="btn">Supprimer</a> -->
             
            </div>
          </div>
        </div>
      </article>
    </section>
    <!-- Section Recomendation -->
    <section  v-show="!selectedProduct" >
      <h2 class="catalogue_titre-section">Nous recommandons</h2>

      <div class="container">
        <div v-for="(bouteille, index) in recommandons.slice(49, 55)" :key="index">
          <article v-if="bouteille.id > 10" class="catalogue__card">
            <div class="catalogue__card-body">
              <img :src="bouteille.image" alt="img-bouteille">
              <picture class="modal"><img :src="bouteille.image" alt="img"></picture>
              <div class="catalogue__card-info">
                <div class="card-info-title">
                  <h3 class="card-title">{{ bouteille.nom }}</h3>
                  <p class="card-subtitle">{{ bouteille.description }} {{ bouteille.format }}</p>
                  <p class="card-subtitle">{{ bouteille.pays }}</p>
                </div>
                <div class="card-info-client">
                  <p class="catalogue__card-count">{{ bouteille.prix_saq }}$</p>
        
                  <router-link class="btn" :to="{name: 'catalogue.edit', params:{ id: bouteille.id } }">
                  Acheter
                </router-link>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>
  </div>
</template> 
 <script>
  import useCatalogue from '../composables/catalogue'
  import { onMounted, ref, computed } from 'vue'
  
  export default {
    setup() {
      const { catalogue, getCatalogue, deleteCatalogue } = useCatalogue()
      const searchTerm = ref('')
      const selectedProduct = ref(null)
      onMounted(getCatalogue)

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
  
      return {
        catalogue,
        getCatalogue,
        deleteCatalogue,
        searchTerm,
        filteredCatalogue,
        selectedProduct,
        recommandons,
        selectProduct
      }
    }
  }
  </script> 
   
    <!-- <template>

    <div class="product-grid" >
      <div class="product-card" v-for="bouteille in catalogue" :key="bouteille.id">
        <img :src="bouteille.image" alt="Product 1">
        <h3>{{bouteille.nom}}</h3>
        <p>{{bouteille.description}}</p>
        <p>{{bouteille.pays}}</p>
        <p>{{bouteille.format}}</p>
        <router-link :to="{name: 'catalogue.edit', params:{ id: bouteille.id } }">
            Modifier
        </router-link>
        <br>
        <a href="#" @click.prevent="deleteCatalogue(bouteille.id)">Supprimer</a>
      </div>
    </div>
    </template>
    
    <script>
    import useCatalogue from '../composables/catalogue'
    import { onMounted } from 'vue'
        export default{
    
            setup(){
                const { catalogue, getCatalogue, deleteCatalogue } = useCatalogue()
                onMounted(getCatalogue)
                return { 
                    catalogue, 
                    getCatalogue, 
                    deleteCatalogue 
                }
            }
        }
    </script> -->

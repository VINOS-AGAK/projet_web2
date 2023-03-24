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

    <!-- <template>
        <div>
            <input type="text" v-model="searchTerm" autocomplete="off" list="catalogue-names">
            <datalist id="catalogue-names">
              <option v-for="bouteille in catalogue" :value="bouteille.nom"><img :src="bouteille.image" alt="img-bouteille">{{ bouteille.nom }}</option>
            </datalist>
            <div class="product-grid">
                <div class="product-card" v-for="bouteille in filteredCatalogue" :key="bouteille.id">
             
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
        </div>
      </template>
      
      <script>
      import useCatalogue from '../composables/catalogue'
      import { onMounted, ref, computed } from 'vue'
      
      export default {
        setup() {
          const { catalogue, getCatalogue, deleteCatalogue } = useCatalogue()
          const searchTerm = ref('')
          onMounted(getCatalogue)
      
          const filteredCatalogue = computed(() => {
            return catalogue.value.filter(bouteille => {
              return bouteille.nom.toLowerCase().includes(searchTerm.value.toLowerCase())
            })
          })
      
          return {
            catalogue,
            getCatalogue,
            deleteCatalogue,
            searchTerm,
            filteredCatalogue
          }
        }
      }
      </script> -->

      <!-- <template>
        <div>
            <input type="text" v-model="searchTerm" autocomplete="off" list="catalogue-names" @input="selectedProduct = filteredCatalogue[0]">

          <datalist id="catalogue-names">
            <option v-for="bouteille in catalogue" :value="bouteille.nom"><img :src="bouteille.image" alt="img-bouteille">{{ bouteille.nom }}</option>
          </datalist>
          <div v-if="selectedProduct" class="product-card">
            <img :src="selectedProduct.image" alt="Selected Product">
            <h3>{{ selectedProduct.nom }}</h3>
            <p>{{ selectedProduct.description }}</p>
            <p>{{ selectedProduct.pays }}</p>
            <p>{{ selectedProduct.format }}</p>
            <router-link :to="{name: 'catalogue.edit', params:{ id: selectedProduct.id } }">
              Modifier
            </router-link>
            <br>
            <a href="#" @click.prevent="deleteCatalogue(selectedProduct.id)">Supprimer</a>
          </div>
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
      
          const filteredCatalogue = computed(() => {
            
            return catalogue.value.filter(bouteille => {
              return bouteille.nom.toLowerCase().includes(searchTerm.value.toLowerCase())
            })
        
          })
      
          return {
            catalogue,
            getCatalogue,
            deleteCatalogue,
            searchTerm,
            filteredCatalogue,
            selectedProduct
          }
        }
      }
      </script> -->
      
      <!-- <template>
        <div>
          <input type="text" v-model="searchTerm" autocomplete="off" list="catalogue-names" @input="selectedProduct = filteredCatalogue[0]">
        
          <datalist id="catalogue-names">
            <option v-for="bouteille in filteredCatalogue.slice(0, 6)" :value="bouteille.nom">{{ bouteille.nom }}</option>
          </datalist>
          <div v-if="selectedProduct" class="product-card">
            <img :src="selectedProduct.image" alt="Selected Product">
            <h3>{{ selectedProduct.nom }}</h3>
            <p>{{ selectedProduct.description }}</p>
            <p>{{ selectedProduct.pays }}</p>
            <p>{{ selectedProduct.format }}</p>
            <router-link :to="{name: 'catalogue.edit', params:{ id: selectedProduct.id } }">
              Modifier
            </router-link>
            <br>
            <a href="#" @click.prevent="deleteCatalogue(selectedProduct.id)">Supprimer</a>
          </div>
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
      
          const filteredCatalogue = computed(() => {
            if (searchTerm.value.length < 2) {
              
              return []
            }
            return catalogue.value.filter(bouteille => {
              return bouteille.nom.toLowerCase().includes(searchTerm.value.toLowerCase())
            })
          })
          
      
          return {
            catalogue,
            getCatalogue,
            deleteCatalogue,
            searchTerm,
            filteredCatalogue,
            selectedProduct
          }
        }
      }
      </script> -->
<!--       
      <template>
  <div>
    <input type="text" v-model="searchTerm" autocomplete="off" list="catalogue-names" @input="selectedProduct = filteredCatalogue[0]">
     -->

    <!-- <datalist id="catalogue-names">
      <option v-for="bouteille in filteredCatalogue.slice(0, 6)" :value="bouteille.nom">{{ bouteille.nom }}</option>
    </datalist> -->
    <!-- <datalist id="catalogue-names">
  <option v-for="bouteille in filteredCatalogue.slice(0, 6)" :value="bouteille.nom" @click="selectProduct(bouteille)">{{ bouteille.nom }}</option>
</datalist>

    <div v-if="selectedProduct" class="product-card">
      <img :src="selectedProduct.image" alt="Selected Product">
      <h3>{{ selectedProduct.nom }}</h3>
      <p>{{ selectedProduct.description }}</p>
      <p>{{ selectedProduct.pays }}</p>
      <p>{{ selectedProduct.format }}</p>
      <router-link :to="{name: 'catalogue.edit', params:{ id: selectedProduct.id } }">
        Modifier
      </router-link>
      <br>
      <a href="#" @click.prevent="deleteCatalogue(selectedProduct.id)">Supprimer</a>
    </div>
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

    const filteredCatalogue = computed(() => {
      if (searchTerm.value.length < 2) {
        
        return []
      }
      return catalogue.value.filter(bouteille => {
        return bouteille.nom.toLowerCase().includes(searchTerm.value.toLowerCase())
      })
    })

    
    const selectProduct = (product) => {
      selectedProduct.value = product
    }

    return {
      catalogue,
      getCatalogue,
      deleteCatalogue,
      searchTerm,
      filteredCatalogue,
      selectedProduct,
      selectProduct
    }
  }
}
</script> -->

<template>
    <div>
        <header class="site-header">
            <form class="search" action="#" method="GET">
                <input type="search" v-model="searchTerm" autocomplete="off" list="catalogue-names" @change="selectProduct">
                <button type="submit" class="search-button"> 
        </button>
            </form>

        </header>
      
    
      <datalist class="listeAutoComplete" id="catalogue-names">
        <option v-for="bouteille in filteredCatalogue.slice(0, 6)" :value="bouteille.nom">{{ bouteille.nom }}</option>
      </datalist>
      <section class="catalogue-container">

          <article v-if="selectedProduct" class="product-card">
            <!-- <img :src="selectedProduct.image" alt="Selected Product">
            <h3>{{ selectedProduct.nom }}</h3>
            <p>{{ selectedProduct.description }}</p>
            <p>{{ selectedProduct.pays }}</p>
            <p>{{ selectedProduct.format }}</p>
            <router-link :to="{name: 'catalogue.edit', params:{ id: selectedProduct.id } }">
              Modifier
            </router-link>
            <br>
            <a href="#" @click.prevent="deleteCatalogue(selectedProduct.id)">Supprimer</a> -->
    
            <div class="card-body">
              <img :src="selectedProduct.image" alt="img-bouteille">
              <picture class="modal"><img :src="selectedProduct.image" alt="img-bouteille"></picture>
              <div class="card-info">
                <div class="card-info-title">
                  <h3 class="card-title">{{ selectedProduct.nom }}</h3>
                  <p class="card-subtitle">{{ selectedProduct.description }} {{ selectedProduct.format }}</p>
                  <p class="card-subtitle">{{ selectedProduct.pays }}</p>
                </div>
                <div class="card-info-client">
                  <p class="card-count">{{ selectedProduct.prix_saq }}$</p>
                  <div class="card-footer">
                    <button class="btn" value="">Buy Now</button>
                    <router-link :to="{name: 'catalogue.edit', params:{ id: selectedProduct.id } }">
              Modifier
            </router-link>
            <br>
            <a href="#" @click.prevent="deleteCatalogue(selectedProduct.id)" class="btn">Supprimer</a>
                  </div>
                </div>
              </div>
            </div>
          </article>
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
  
      const filteredCatalogue = computed(() => {
        if (searchTerm.value.length < 2) {
          // Если пользователь ввел меньше двух символов, то показываем пустой список
          return []
        }
        return catalogue.value.filter(bouteille => {
          return bouteille.nom.toLowerCase().includes(searchTerm.value.toLowerCase())
        })
      })
      
      const selectProduct = () => {
        // Устанавливаем выбранный продукт только после того, как пользователь выберет продукт из списка
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
        selectProduct
      }
    }
  }
  </script>
   
    
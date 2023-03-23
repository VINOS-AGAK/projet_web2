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
    <template>
        <div>
            <input type="text" v-model="searchTerm" autocomplete="off" list="catalogue-names">
    <datalist id="catalogue-names">
      <option v-for="bouteille in catalogue" :value="bouteille.nom">{{ bouteille.nom }}</option>
    </datalist>
          <div class="product-grid">
            <div class="product-card" v-for="bouteille in filteredCatalogue" :key="bouteille.id">
              <!-- Код для отображения товара -->
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
      </script>
      
    
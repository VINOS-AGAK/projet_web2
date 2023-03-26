<template>
    <div class="accueil-container">
        <div class="accueil-overlay">
          
          <h1 class="accueil-titre">Découvrez le monde du vin à portée de main</h1>
          <p class="accueil-paragraph">Le vin n'a jamais été une mauvaise idée</p>

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
        selectProduct
      }
    }
  }
  </script> 
   

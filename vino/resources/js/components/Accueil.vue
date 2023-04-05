<template>
    <div class="accueil-container">
        <div class="accueil-overlay">
          
          <h1 class="accueil-titre">Découvrez le monde du vin à portée de main</h1>
          <p class="accueil-paragraph">Le vin n'a jamais été une mauvaise idée</p>

        </div>

    </div>

</template> 
 <script>
 // Import du hook "useCatalogue" pour la gestion du catalogue de bouteilles
  import useCatalogue from '../composables/catalogue'
  import { onMounted, ref, computed } from 'vue'
  
  export default {
    setup() {
      // Récupération des données et fonctions nécessaires pour la gestion du catalogue de bouteilles grâce au hook "useCatalogue"
      const { catalogue, getCatalogue, deleteCatalogue } = useCatalogue()
      
      const searchTerm = ref('')
      const selectedProduct = ref(null)

      // Appel de la fonction "getCatalogue" lorsque le composant est monté
      onMounted(getCatalogue)
  
      // Création d'une variable calculée "filteredCatalogue" pour filtrer le catalogue de bouteilles en fonction de la recherche
      const filteredCatalogue = computed(() => {
        if (searchTerm.value.length < 2) {
          return []
        }
        return catalogue.value.filter(bouteille => {
          return bouteille.nom.toLowerCase().includes(searchTerm.value.toLowerCase())
        })
      })
      
      // Fonction pour sélectionner une bouteille lorsqu'une recherche est effectuée
      const selectProduct = () => {
        if (searchTerm.value !== '' && selectedProduct.value === null) {
          selectedProduct.value = filteredCatalogue.value[0]
        }
      }
  
      // Retourne les données nécessaires pour l'affichage du catalogue de bouteilles
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
   

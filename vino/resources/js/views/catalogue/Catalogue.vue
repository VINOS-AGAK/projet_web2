<template  > 

  <div>

    <div class="catalogue-container" >
      <form class="catalogue__liste-search">
  <div class="search-box">
    <input type="search" class="search-input" placeholder="Recherche dans catalogue" v-model="searchQuery" @input="handleInput">
    <button type="submit" class="search-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
        <path d="m19.45 21.325-6.3-6.3q-.725.55-1.675.85-.95.3-2.05.3-2.775 0-4.712-1.937Q2.775 12.3 2.775 9.525q0-2.775 1.938-4.713Q6.65 2.875 9.425 2.875q2.775 0 4.712 1.937 1.938 1.938 1.938 4.713 0 1.1-.313 2.05-.312.95-.837 1.65l6.325 6.325ZM9.425 13.65q1.725 0 2.925-1.2 1.2-1.2 1.2-2.925 0-1.725-1.2-2.925-1.2-1.2-2.925-1.2Q7.7 5.4 6.5 6.6 5.3 7.8 5.3 9.525q0 1.725 1.2 2.925 1.2 1.2 2.925 1.2Z" />
      </svg></button>
  </div>
  <ul class="listeAutoComplete">
    <!-- Affiche la liste d’autocompletes -->
    <li v-for="(result, index) in searchResults" :key="index" @click="selectResult(result)">
      <img :src="result.image" alt="img-bouteille">{{ result.nom }}
    </li>
  </ul>
</form>

        <div v-if="!selectedCard" class="catalogue-invisible">
            <div class="card" v-for="bouteille in filteredCatalogue" :key="bouteille.id">
                <h3 class="card-title">{{ bouteille.nom }}</h3>
                <p class="card-subtitle">{{ bouteille.description }} {{ bouteille.format }}</p>
                <p class="card-subtitle">{{ bouteille.pays }}</p>
                <p class="card-count">{{ bouteille.prix_saq }}$</p>
                <div class="card-footer">
                    <button class="btn" @click="selectCard(bouteille)">Buy Now</button>
                </div>
            </div>
        </div>
        <div class="card" v-else>
          <div class="card-body">
                <img :src="selectedCard.image" alt="img-bouteille">
                <picture class="modal"><img :src="selectedCard.image" alt="img"></picture>
                <div class="card-info">
                    <div class="card-info-title">
                        <h3 class="card-title">{{ selectedCard.nom }}</h3>
                        <p class="card-subtitle">{{ selectedCard.description }} {{ selectedCard.format }}</p>
                        <p class="card-subtitle">{{ selectedCard.pays }}</p>
                    </div>
                    <div class="card-info-client">
                        <p class="card-count">{{ selectedCard.prix_saq }}$</p>
                        <div class="card-footer">
                            <button  class="btn" value="">Buy Now</button>   
                      
                        </div>
                    </div>  
                </div> 
            </div>
      
          
        </div>
           
    </div> 
    <div>
      <h2>Nous recommandons</h2>
      <div class="card"  v-for="bouteille in catalogue" :key="bouteille.id">
          <div class="card-body">
                <img :src="bouteille.image" alt="img-bouteille">
                <picture class="modal"><img :src="bouteille.image" alt="img"></picture>
                <div class="card-info">
                    <div class="card-info-title">
                        <h3 class="card-title">{{ bouteille.nom }}</h3>
                        <p class="card-subtitle">{{ bouteille.description }} {{ bouteille.format }}</p>
                        <p class="card-subtitle">{{ bouteille.pays }}</p>
                    </div>
                    <div class="card-info-client">
                        <p class="card-count">{{ bouteille.prix_saq }}$</p>
                        <div class="card-footer">
                            <button  class="btn" value="">Buy Now</button>   
                      
                        </div>
                    </div>  
                </div> 
            </div>
      
          
        </div>
    </div>
  </div>
    
    
    
</template>

<!-- recherche sans afficher catalogue au premier telechargement avec 2 lettres-->
<script>
import axios from "axios";

export default {
  data() {
    return {
      catalogue: [],
      searchQuery: "",
      searchDelay: 500, // délai avant pousser la requette
      searchTimerId: null, // délai de minuterie d’id
      searchResults: [], // liste d’autocompletes
    };
  },
  mounted(){this.fetchCataloguePlein()},
  methods: {
    fetchCatalogue() {
      axios
        .get("api/bouteille", { params: { query: this.searchQuery } })
        .then((response) => {
          //console.log(response.data);
          this.catalogue = response.data.data;
           this.searchResults = this.filteredCatalogue.slice(0, 5); // sélectionne les 5 premiers résultats filtrés
        })
        .catch((error) => console.log(error));
    },
   
    handleInput() {
      if (this.searchQuery.length >= 2) {

        // réinitialiser le minuteur pour éviter d’envoyer une demande avec retard précédent
        clearTimeout(this.searchTimerId);
        // lancer une nouvelle minuterie pour envoyer une requête via searchDelay milliseconds
        this.searchTimerId = setTimeout(() => {
          this.fetchCatalogue();
        }, this.searchDelay);
      } else {
        this.searchResults = []; // efface la liste des autocompletes
      }
    
    },
    selectResult(result) {
      this.searchQuery = result.nom; // choisi le résultat
      this.selectedCard = result; // installe la carte sélectionnée
      this.searchResults = []; // effacer la liste des autocompletes
    },
    selectCard(card) {
      this.selectedCard = card; // choisi le résultat
    },
    fetchCataloguePlein(){
      axios
      .get('/api/bouteille')
      .then((response) => {this.catalogue = response.data.data;
      this.catalogue = this.catalogue.slice(0, 5);
    })
      .catch(error =>console.log(error))
    },
  },
  computed: {
    filteredCatalogue() {
      const query = this.searchQuery.toLowerCase().trim();
      if (!query) {
        return this.catalogue;
      }
      return this.catalogue.filter((bouteille) => {
        return (
          bouteille.nom.toLowerCase().includes(query) ||
          bouteille.pays.toLowerCase().includes(query) ||
          bouteille.format.toLowerCase().includes(query) ||
          bouteille.prix_saq.toLowerCase().includes(query)
        );
      });
    },
  },
};
</script>










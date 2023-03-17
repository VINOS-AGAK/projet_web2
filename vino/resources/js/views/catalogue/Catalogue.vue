<template  >   
    <div>
        <form class="liste-search">
            <input
               placeholder="Recherche dans catalogue"
               type="search"
               v-model="searchQuery"
               @input="handleInput"/>
        </form>
        <ul class="listeAutoComplete">
      <!-- Выводим список автозаполнения -->
      <li v-for="(result, index) in searchResults" :key="index" @click="selectResult(result)">
        {{ result.nom }}
      </li>
    </ul>
        <div class="card" v-for="bouteille in filteredCatalogue" :key="bouteille.id">
            <div class="card-body">
                <img :src="bouteille.image" alt="img-bouteille">
                <picture class="modal"><img :src="bouteille.image" alt="img"></picture>
                <div class="card-info">
                    <div class="card-info-title">
                        <h3 class="card-title">{{bouteille.nom}}</h3>
                        <p class="card-subtitle">{{bouteille.description}} {{bouteille.format}}</p>
                        <p class="card-subtitle">{{bouteille.pays}}</p>
                    </div>
                    <div class="card-info-client">
                        <p class="card-count">{{bouteille.prix_saq}}$</p>
                        <div class="card-footer">
                            <button  class="btn" value="">Buy Now</button>   
                      
                        </div>
                    </div>  
                </div> 
            </div>
        </div>
           
    </div> 
    <!-- <div class="product-card" v-for="bouteille in catalogue" :key="bouteille.id"> --> 
</template>

<!-- ПОИСК без АФИШАЖа КАТАЛОГА ПРИ ПЕРВОЙ ЗАГРУЗКЕ с 2 буквами   -->
<script>
import axios from "axios";

export default {
  data() {
    return {
      catalogue: [],
      searchQuery: "",
      searchDelay: 500, // задержка перед отправкой запроса
      searchTimerId: null, // id таймера задержки
      searchResults: [], // список автозаполнения
    };
  },
  methods: {
    fetchCatalogue() {
      axios
        .get("api/bouteille", { params: { query: this.searchQuery } })
        .then((response) => {
          //console.log(response.data);
          this.catalogue = response.data.data;
           this.searchResults = this.catalogue.slice(0, 5); // выбираем первые 5 результатов
        })
        .catch((error) => console.log(error));
    },
    handleInput() {
      if (this.searchQuery.length >= 2) {

        // сбрасываем таймер, чтобы не отправлять запрос с предыдущей задержкой
        clearTimeout(this.searchTimerId);
        // запускаем новый таймер, чтобы отправить запрос через searchDelay миллисекунд
        this.searchTimerId = setTimeout(() => {
          this.fetchCatalogue();
        }, this.searchDelay);
      }
    
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










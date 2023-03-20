<template>
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
</template>

<script>
    import axios from "axios";

export default{
    components: {
    Carrousele
  },
    data() {
    return {
      catalogue: [],
      
    };

  },
  mounted(){this.fetchCataloguePlein()},
  methods: {
    
    fetchCataloguePlein(){
      axios
      .get('/api/bouteille')
      .then((response) => {this.catalogue = response.data.data;
      this.catalogue = this.catalogue.slice(0, 5);
    })
      .catch(error =>console.log(error))
    },
  },

}
</script>
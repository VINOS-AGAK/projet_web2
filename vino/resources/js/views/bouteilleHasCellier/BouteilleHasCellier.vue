<template>
    <div class="container">

        
        <div class="card" v-for="bouteille in bouteilleHasCellier" :key="bouteille.id" >
            <div class="card-body">
                <img :src="bouteille.image" :alt="bouteille.nom">
                <picture class="modal">
                    <img :src="bouteille.image" :alt="bouteille.nom">
                </picture>
                <div class="card-info">
                    <div class="card-info-title">
                        <h3 class="card-title">{{ bouteille.nom }}</h3>
                        <p class="card-subtitle">White wine {{ bouteille.format }}</p>
                        <p class="card-subtitle">{{ bouteille.pays }}</p>
                    </div>
                    <div class="card-info-client">
                        <p class="card-count">Prix : {{ bouteille.prix_saq }} $</p>
                        <p class="card-rating">Note: &#9733;&#9733;&#9733;&#10025;</p>
                        <div class="card-footer">
                          <button  class="card-btn_add " value="">+</button>   
                          <button  class="card-btn_add deleteModalBtn" value="" >-</button>   
                        </div>
                    </div>  
                </div> 
            
            </div>

              
        </div>
       
        <div class="catalogue-container"  v-if="bouteilleHasCellier.length === 0">
            <ul>
                <li class="text-danger">Aucune bouteilles disponible dans le cellier</li>
            </ul>
        </div>
        

    </div>
</template>

<script>

import axios from "axios";
export default {
    
    data() {
        return {
            bouteilleHasCellier: [],
        }
    },
    mounted() {
        this.fetchBouteilleHasCellier();
    },
    methods: {
        fetchBouteilleHasCellier(){
            axios
            .get("api/bouteilleHasCellier")
            .then((response) =>{
                console.log(response.data);
                this.bouteilleHasCellier = response.data.data;
            } )
            .catch(error =>console.log(error));
        }
    }
    
}
</script>
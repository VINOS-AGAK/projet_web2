<template>
    
    <section class="liste-container">
        <div class="ajouter-cellier">      
            <router-link :to="{name: 'catalogue.create'}" class="ajouter-cellier__bouton">Ajouter nouvelle bouteille</router-link>
        </div>
    
        <h2 class="liste__titre" >{{ oneCellier.nom }}</h2>
        <article class="container">
            <div class="card" v-for="bouteille in mesBouteilles" :key="bouteille.id" >
                <div class="card-body">
                    <img :src="bouteille.image" :alt="bouteille.nom">
                    <picture class="modal">
                        <img :src="bouteille.image" :alt="bouteille.nom">
                    </picture>
                    <div class="card-info">
                        <div class="card-info-title">
                            <h3 class="card-title">{{ bouteille.nom }}</h3>
                            <p class="card-subtitle">{{ bouteille.description }} {{ bouteille.format }}</p>
                            <!-- <p class="card-subtitle">{{ bouteille.pays }}</p> -->
                        </div>
                        <div class="card-info-client">
                            <p class="card-count"> {{ bouteille.prix_saq }} $</p>
                            <p class="card-rating"> {{ bouteille.quantite }} bouteille</p>
                            <p class="card-rating"> &#9733;&#9733;&#9733;&#10025;</p>
                            
                        </div> 
                        <div class="card-footer">
                              <router-link  class="card-btn_supp " value="" :to="{ name: 'bouteille.edit', params: { id: bouteille.id } }">+</router-link>   
                              <button  class="card-btn_supp deleteModalBtn" value="" @click.prevent="deleteBouteille(bouteille.id)" >-</button>   
                        </div> 
                    </div> 
                
                </div>
    
                  
            </div>
           
            <div class="container"  v-if="mesBouteilles.length === 0">
                <ul>
                    <li class="text-danger">Aucune bouteilles disponible dans ce cellier</li>
                </ul>
            </div>
            
    
        </article>
    </section>
</template>
    
<script>
import useBouteille from '../../composables/bouteille'
import { onMounted, getCurrentInstance } from 'vue'
import useCellier from '../../composables/cellier'

export default {

    setup() {
        
        const { mesBouteilles, getMesBouteilles,deleteBouteille } = useBouteille()
        const { $route } = getCurrentInstance().proxy
        const { oneCellier, getOneCellier } = useCellier();

        onMounted(() => {
            console.log('le param id passe du cellier' ,$route.params.id);
            getMesBouteilles();
            getOneCellier($route.params.id);
            console.log(oneCellier);

        })
        

        return {
            mesBouteilles,
            getMesBouteilles,
            deleteBouteille,
            oneCellier,
            getOneCellier,
            
        }
    }
}
</script>
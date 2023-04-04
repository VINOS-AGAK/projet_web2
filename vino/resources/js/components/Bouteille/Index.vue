<template >
    <div class="trier-container" >
        <ul class="trier-liste" >
            <li class="trier-item" @click="trierItem(bouteille.pays)" v-for="bouteille in mesBouteilles" :key="bouteille.id">{{bouteille.pays}}</li>
        </ul>
    </div>

    <section class="liste-container" v-if="trier==true">
        <div class="ajouter-cellier">      
            <router-link :to="{name: 'catalogue.index'}" class="ajouter-cellier__bouton">Ajouter nouvelle bouteille</router-link>
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
                        </div>
                        <div class="card-info-client">
                            <p class="card-count"> {{ bouteille.prix_saq }} $</p>
                            <p class="card-rating"> {{ bouteille.quantite }} bouteille</p>
                            <p class="card-rating"> &#9733;&#9733;&#9733;&#10025;</p>
                        </div> 
                        <div class="card-footer">
                              <button  class="card-btn_add " @click.prevent="increment(bouteille.id)" >+</button>    
                              <button  class="card-btn_supp " @click.prevent="decrement(bouteille.id)">-</button>   
                              <button  class="card-btn_modif deleteModalBtn" value="" @click.prevent="deleteBouteille(bouteille.id)" >Supprimer du cellier</button>   
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

    <section class="liste-container" v-else>
        <h2>trier = true</h2>
    </section>
</template>

    
<script>
import useBouteille from '../../composables/bouteille'
import { onMounted, getCurrentInstance, watch, ref } from 'vue'
import useCellier from '../../composables/cellier'

export default {

    setup() {
        
        const { mesBouteilles, getMesBouteilles,deleteBouteille, trierMesBouteilles } = useBouteille()
        const { $route } = getCurrentInstance().proxy
        const { oneCellier, getOneCellier } = useCellier();
        let trier = ref(true);

        const increment = async (id) => {
            axios.put('api/bouteille/' + id + '/increment')
                .then(response => {
                    getMesBouteilles();
                })
                .catch(error =>{
                    console.log(error.response.data.errors);
                })
        }

        const decrement = async (id) => {
            axios.put('api/bouteille/' + id + '/decrement')
                .then(response => {
                    getMesBouteilles();
                })
                .catch(error =>{
                    console.log(error.response.data.errors);
                })
        }

        onMounted(() => {
            console.log('le param id passe du cellier' ,$route.params.id);
            getMesBouteilles();
            getOneCellier($route.params.id);
            console.log(oneCellier);

        })

        const trierItem=(itemName)=>{
            trier.value = false;
            handleTrierChange(itemName);
        }

        const handleTrierChange = (itemName) => {
            trierMesBouteilles(itemName,trier);
        }

        watch(() => trier, handleTrierChange);

        
        return {
            mesBouteilles,
            getMesBouteilles,
            deleteBouteille,
            oneCellier,
            getOneCellier,
            increment,
            decrement,
            trierItem, 
            trier
        }
    }
}
</script>

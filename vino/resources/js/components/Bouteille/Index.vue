<template>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <div class="trier-container">
        <ul class="trier-liste">
            <li class="trier-item" @click="trierItem('italie')">italie</li>
            <li class="trier-item" @click="trierItem('france')">france</li>
            <li class="trier-item" @click="trierItem('espagne')">espagne</li>
            <li class="trier-item" @click="trierItem('australie')">australie</li>
            <li class="trier-item" @click="trierItem('canada')">canada</li>
            <li class="trier-item" @click="trierItem('etats-unis')">etats-unis</li>
            <li class="trier-item" @click="trierItem('allemagne')">allemagne</li>
            <li class="trier-item" @click="trierItem('Arménie')">Arménie</li>
        </ul>
    </div>
    <section class="liste-container">
        <div class="ajouter-cellier">      
            <router-link :to="{name: 'catalogue.index'}" class="ajouter-cellier__bouton">Ajouter nouvelle bouteille</router-link>
        </div>
    
        <h2 class="liste__titre" >{{ oneCellier.nom }}</h2>
        <article class="container">
            <div class="card" v-for="bouteille in oneCellier" :key="bouteille.id" >
                <div class="card-body">
                    <img :src="bouteille.image" :alt="bouteille.nom">
                    <picture class="modal">
                        <img :src="bouteille.image" :alt="bouteille.nom">
                    </picture>
                    <div class="card-info">
                        <div class="card-info-title">
                            <h3 class="card-title">{{ bouteille.nom }}</h3>
                            <p class="card-subtitle">{{ bouteille.description }} </p>
                        </div>
                        <div class="card-info-client">
                            <p class="card-count"> {{ bouteille.prix_saq }} $</p>
                            <p class="card-count"> {{ bouteille.quantite }} bouteille</p>
                        </div> 

                        <!-- Si vous ajouter une note dans DB vous alez le voir ici -->
                        <div      v-if="bouteille.notes && bouteille.notes == 5" class="card-stars" > &#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <div v-else-if="bouteille.notes && bouteille.notes == 4" class="card-stars" > &#9733;&#9733;&#9733;&#9733;&#10025;</div>
                        <div v-else-if="bouteille.notes && bouteille.notes == 3" class="card-stars" > &#9733;&#9733;&#9733;&#10025;&#10025;</div>
                        <div v-else-if="bouteille.notes && bouteille.notes == 2" class="card-stars" > &#9733;&#9733;&#10025;&#10025;&#10025;</div>
                        <div v-else-if="bouteille.notes && bouteille.notes == 1" class="card-stars" > &#9733;&#10025;&#10025;&#10025;&#10025;</div>
                        <div v-else class="card-count" >Aucun note</div>

                        <form @submit.prevent='changeNote(bouteille)'>
                            <div>
                                <fieldset>
                                    <legend>Note:</legend>
                                    <input className="radio" v-model="bouteille.notes" type="radio" value="1" id="star1" name="rating" />
                                    <label for="star1">1</label>
                                    <input className="radio" v-model="bouteille.notes" type="radio" value="2" id="star2" name="rating" />
                                    <label for="star2">2</label>
                                    <input className="radio" v-model="bouteille.notes" type="radio" value="3" id="star3" name="rating" />
                                    <label for="star3">3</label>
                                    <input className="radio" v-model="bouteille.notes" type="radio" value="4" id="star4" name="rating" />
                                    <label for="star4">4</label>
                                    <input className="radio" v-model="bouteille.notes" type="radio" value="5" id="star5" name="rating" />
                                    <label for="star5">5</label>
                                </fieldset>
                                <!-- button -->
                                <button :disabled="isLoading" class="">
                                    <div v-show="isLoading" class=""></div>
                                    <span v-if="isLoading">Processing...</span>
                                    <span class="card-btn_modif" v-else>Sauvegarder Note</span>
                                </button>
                            </div>
                        </form>

                        <div class="card-footer">
                              <button  class="card-btn_add " @click.prevent="increment(bouteille.id)" >+</button>    
                              <button  class="card-btn_supp " @click.prevent="decrement(bouteille.id)" :disabled="bouteille.quantite < 1">-</button>   
                              <!-- <button  class="card-btn_delete deleteModalBtn" value="" @click.prevent="deleteBouteille(bouteille.id)" :disabled="bouteille.quantite > 1">Supprimer du cellier</button>    -->
                              <button  class="card-btn_delete deleteModalBtn" value="" @click.prevent="deleteBouteille(bouteille.id)" :disabled="bouteille.quantite > 1">
                                <svg width="10pt" height="10pt" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 105.7 122.88"><path d="M30.46,14.57V5.22A5.18,5.18,0,0,1,32,1.55v0A5.19,5.19,0,0,1,35.68,0H70a5.22,5.22,0,0,1,3.67,1.53l0,0a5.22,5.22,0,0,1,1.53,3.67v9.35h27.08a3.36,3.36,0,0,1,3.38,3.37V29.58A3.38,3.38,0,0,1,102.32,33H98.51l-8.3,87.22a3,3,0,0,1-2.95,2.69H18.43a3,3,0,0,1-3-2.95L7.19,33H3.37A3.38,3.38,0,0,1,0,29.58V17.94a3.36,3.36,0,0,1,3.37-3.37Zm36.27,0V8.51H39v6.06ZM49.48,49.25a3.4,3.4,0,0,1,6.8,0v51.81a3.4,3.4,0,1,1-6.8,0V49.25ZM69.59,49a3.4,3.4,0,1,1,6.78.42L73,101.27a3.4,3.4,0,0,1-6.78-.43L69.59,49Zm-40.26.42A3.39,3.39,0,1,1,36.1,49l3.41,51.8a3.39,3.39,0,1,1-6.77.43L29.33,49.46ZM92.51,33.38H13.19l7.94,83.55H84.56l8-83.55Z"/></svg></button>   
                        </div> 
                    </div> 
                </div>   
                <!-- <div class="container-form ">
                    Stars modal &#9733;&#9733;&#9733;&#9733;&#9733;
                </div> -->
            </div>
           
            <div class="container"  v-if="oneCellier.length === 0">
                <ul>
                    <li class="text-danger">Aucune bouteilles disponible dans ce cellier</li>
                </ul>
            </div>

        </article>
    </section>
</template>
    
<script>

import useBouteille from '../../composables/bouteille'
import useCellier from '../../composables/cellier'
import { onMounted, getCurrentInstance } from 'vue'
import axios from 'axios'

export default {

    setup() {

        // Utilise le module 'useBouteille' pour obtenir les bouteilles
        const { mesBouteilles, getMesBouteilles, deleteBouteille, trierMesBouteilles } = useBouteille()
        // Obtient l'objet $route depuis l'instance en cours
        const { $route } = getCurrentInstance().proxy
        // Utilise le module 'useCellier' pour obtenir un cellier
        const { oneCellier, getOneCellier } = useCellier();

        // Incrémente la quantité d'une bouteille
        const increment = async (id) => {
            axios.put('api/bouteille/' + id + '/increment')
                .then(response => {
                    getOneCellier($route.params.id);
                })
                .catch(error =>{
                    console.log(error.response.data.errors);
                })
        }

        // Décrémente la quantité d'une bouteille
        const decrement = async (id) => {
            axios.put('api/bouteille/' + id + '/decrement')
                .then(response => {
                    getOneCellier($route.params.id);
                    const bouteille = oneCellier.find(b => b.id === id);
                    if (bouteille && bouteille.quantite === 0) {
                        deleteMaBouteille(id);
                    }
                })
                .catch(error =>{
                    console.log(error.response.data.errors);
                })

        
        }

        // Supprime une bouteille
        const deleteMaBouteille = async (id) => {
            axios.delete('api/bouteille/' + id)
                .then(response => {
                    getMesBouteilles();
                    getOneCellier($route.params.id);
                })
                .catch(error =>{
                    console.log(error.response.data.errors);
                })
        }

        const changeNote = async(bouteille) => {
            console.log(bouteille);
            console.log(bouteille.notes);
            axios.put(`api/bouteille/${bouteille.id}`, {notes: bouteille.notes})
            .then(response => {
                getOneCellier($route.params.id);
            })
        }


        onMounted(async () => {
            console.log('le param id passe du cellier' ,$route.params.id);
            getMesBouteilles();
            await getOneCellier($route.params.id);
            console.log(oneCellier);

        })

        const trierItem=(itemName)=>{
            trierMesBouteilles(itemName);
            console.log('inside of trier item');
        }
        
        // Retourne les données et les fonctions du composant
        return {
            mesBouteilles,
            oneCellier,
            getMesBouteilles,
            deleteBouteille,
            getOneCellier,
            increment,
            decrement,
            trierItem,
            changeNote
        }
    }
}
</script>
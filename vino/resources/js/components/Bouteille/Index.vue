<template >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <div class="trier-container" >
        <ul class="trier-liste" >
            <li class="trier-item"  v-for="bouteille in oneCellier" :key="bouteille.id">
                <span @click="trierItem(bouteille.pays)">{{bouteille.pays}}</span>
            </li>
        </ul>
    </div>

    <section class="liste-container" v-if="trier==true">
        <div class="ajouter-cellier">      
            <router-link :to="{name: 'catalogue.index'}" class="ajouter-cellier__bouton">Ajouter nouvelle bouteille</router-link>
        </div>
    
        <h2 class="liste__titre" >{{ oneCellier.nom }}</h2>
        <article class="container">
            <div class="card" v-for="bouteille in oneCellier" :key="bouteille.id" >
                <div class="card-body">
                    <img :src="bouteille.image" :alt="bouteille.nom">
                    <section class="">

                            <h3 class="card-title">{{ bouteille.nom }}</h3>
                            <p class="card-subtitle">{{ bouteille.description }} </p>
                            
                            <p class="card-count"> {{ bouteille.prix_saq }} $</p>
                            <p class="card-count"> {{ bouteille.quantite }} bouteille</p>
                        <div>
                            <div class="stars-flex">
                                <legend></legend>
                                <form @submit.prevent='changeNote(bouteille)'>
                                    <fieldset>
                                        <button class="stars-btn">
                                            <input class="radio" v-model="bouteille.notes" type="radio" value="1" :id="'star'+bouteille.id+1" name="rating" />
                                            <label :for="'star'+bouteille.id+1">1</label>
                                        </button>
                                    </fieldset>
                                </form>

                                <form @submit.prevent='changeNote(bouteille)'>
                                    <fieldset>
                                        <button class="stars-btn">
                                            <input class="radio" v-model="bouteille.notes" type="radio" value="2" :id="'star'+bouteille.id+2" name="rating" />
                                            <label :for="'star'+bouteille.id+2" >2</label>
                                        </button>
                                    </fieldset>
                                </form>

                                <form @submit.prevent='changeNote(bouteille)'>
                                    <fieldset>
                                        <button class="stars-btn">
                                            <input class="radio" v-model="bouteille.notes" type="radio" value="3" :id="'star'+bouteille.id+3" name="rating" />
                                            <label :for="'star'+bouteille.id+3" >3</label>
                                        </button>
                                    </fieldset>
                                </form>

                                <form @submit.prevent='changeNote(bouteille)'>
                                    <fieldset>
                                        <button class="stars-btn">
                                            <input class="radio" v-model="bouteille.notes" type="radio" value="4" :id="'star'+bouteille.id+4" name="rating" />
                                            <label :for="'star'+bouteille.id+4" >4</label>
                                        </button>
                                    </fieldset>
                                </form>

                                <form @submit.prevent='changeNote(bouteille)'>
                                    <fieldset>
                                        <button class="stars-btn">
                                            <input class="radio" v-model="bouteille.notes" type="radio" value="5" :id="'star'+bouteille.id+5" name="rating" />
                                            <label :for="'star'+bouteille.id+5" >5</label>
                                        </button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>

                        <div class="card-footer">
                              <button  class="card-btn_add " @click.prevent="increment(bouteille.id)" >+</button>    
                              <button  class="card-btn_supp " @click.prevent="decrement(bouteille.id)" :disabled="bouteille.quantite < 1">-</button>   
                              <button  class="card-btn_delete deleteModalBtn" value="" @click.prevent="deleteBouteille(bouteille.id)" :disabled="bouteille.quantite > 1">
                                <svg width="10pt" height="10pt" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 105.7 122.88"><path d="M30.46,14.57V5.22A5.18,5.18,0,0,1,32,1.55v0A5.19,5.19,0,0,1,35.68,0H70a5.22,5.22,0,0,1,3.67,1.53l0,0a5.22,5.22,0,0,1,1.53,3.67v9.35h27.08a3.36,3.36,0,0,1,3.38,3.37V29.58A3.38,3.38,0,0,1,102.32,33H98.51l-8.3,87.22a3,3,0,0,1-2.95,2.69H18.43a3,3,0,0,1-3-2.95L7.19,33H3.37A3.38,3.38,0,0,1,0,29.58V17.94a3.36,3.36,0,0,1,3.37-3.37Zm36.27,0V8.51H39v6.06ZM49.48,49.25a3.4,3.4,0,0,1,6.8,0v51.81a3.4,3.4,0,1,1-6.8,0V49.25ZM69.59,49a3.4,3.4,0,1,1,6.78.42L73,101.27a3.4,3.4,0,0,1-6.78-.43L69.59,49Zm-40.26.42A3.39,3.39,0,1,1,36.1,49l3.41,51.8a3.39,3.39,0,1,1-6.77.43L29.33,49.46ZM92.51,33.38H13.19l7.94,83.55H84.56l8-83.55Z"/></svg>
                            </button>   
                        </div> 
                    </section> 
                </div>   
            </div>
           
            <div class="container"  v-if="oneCellier.length === 0">
                <ul>
                    <li class="text-danger">Aucune bouteilles disponible dans ce cellier</li>
                </ul>
            </div>

        </article>
    </section>


    <section class="liste-container" v-else>
        <div class="card" v-for="bouteille in test" :key="bouteille.id" >
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
 

                        <div class="card-footer">
                              <button  class="card-btn_add " @click.prevent="increment(bouteille.id)" >+</button>    
                              <button  class="card-btn_supp " @click.prevent="decrement(bouteille.id)" :disabled="bouteille.quantite < 1">-</button>   
                              <button  class="card-btn_delete deleteModalBtn" value="" @click.prevent="deleteBouteille(bouteille.id)" :disabled="bouteille.quantite > 1">
                                    <svg width="10pt" height="10pt" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 105.7 122.88"><path d="M30.46,14.57V5.22A5.18,5.18,0,0,1,32,1.55v0A5.19,5.19,0,0,1,35.68,0H70a5.22,5.22,0,0,1,3.67,1.53l0,0a5.22,5.22,0,0,1,1.53,3.67v9.35h27.08a3.36,3.36,0,0,1,3.38,3.37V29.58A3.38,3.38,0,0,1,102.32,33H98.51l-8.3,87.22a3,3,0,0,1-2.95,2.69H18.43a3,3,0,0,1-3-2.95L7.19,33H3.37A3.38,3.38,0,0,1,0,29.58V17.94a3.36,3.36,0,0,1,3.37-3.37Zm36.27,0V8.51H39v6.06ZM49.48,49.25a3.4,3.4,0,0,1,6.8,0v51.81a3.4,3.4,0,1,1-6.8,0V49.25ZM69.59,49a3.4,3.4,0,1,1,6.78.42L73,101.27a3.4,3.4,0,0,1-6.78-.43L69.59,49Zm-40.26.42A3.39,3.39,0,1,1,36.1,49l3.41,51.8a3.39,3.39,0,1,1-6.77.43L29.33,49.46ZM92.51,33.38H13.19l7.94,83.55H84.56l8-83.55Z"/>
                                    </svg>
                                </button>   
                        </div> 
                    </div> 
                </div>   

        </div>
    </section>

</template>

    
<script>

import useBouteille from '../../composables/bouteille'
import useCellier from '../../composables/cellier'
import { onMounted, getCurrentInstance, watch, ref, computed, inject } from 'vue'
import axios from 'axios'

export default {

    setup() {
        // Utilise le module 'useBouteille' pour obtenir les bouteilles
        let { trierMesBouteilles, bouteillesTrier, getPaysBouteilles } = useBouteille()
        // Obtient l'objet $route depuis l'instance en cours
        const { $route } = getCurrentInstance().proxy
        // Utilise le module 'useCellier' pour obtenir un cellier
        const { oneCellier, getOneCellier } = useCellier();
        const swal = inject('$swal');
        let trier = ref(true);
        const test = ref([]);



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


        const deleteBouteille = async (id) => { 
        swal({
            title: 'Êtes-vous sûr(e)?',
            text: 'Vous ne pourrez pas annuler cette action !',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Oui, supprimez-le !',
            confirmButtonColor: '#ef4444',
            timer: 20000,
            timerProgressBar: true,
            reverseButtons: true
        })
            .then(result =>{
                if (result.isConfirmed){
                    axios.delete('/api/bouteille/' + id)
                    // getOneCellier(routeParam)
                    .then(response => {
                        swal({
                            icon: 'success',
                            title : 'Suppression Effecté Avec Succès'
                        })
                        getOneCellier($route.params.id)
                    })
                    .catch(error =>{
                        swal({
                            icon: 'error',
                            title : 'Une Erreur Est Arrivée'
                        })
                    })
                }
            })
        }


        const changeNote = async(bouteille) => {
            axios.put(`api/bouteille/${bouteille.id}`, {notes: bouteille.notes})
            .then(response => {
                getOneCellier($route.params.id);
            })
        }


        onMounted(async () => {
            await getOneCellier($route.params.id);
        })

        const trierItem=(itemName)=>{
            trier.value = false;
            handleTrierChange(itemName);
        }

        const handleTrierChange = async(itemName) => {
            bouteillesTrier = await trierMesBouteilles(itemName,trier);
            test.value = bouteillesTrier;
            return test;
        }

        watch(() => trier, handleTrierChange);

        return {
            oneCellier,
            deleteBouteille,
            getOneCellier,
            increment,
            decrement,
            trierItem,
            bouteillesTrier,
            trierMesBouteilles,
            trier,
            changeNote,
            test,
        }
    }, 

 
}
</script>

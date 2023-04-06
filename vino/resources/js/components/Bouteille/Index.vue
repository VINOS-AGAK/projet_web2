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

                    <section>

                        <h3 class="card-title">{{ bouteille.nom }}</h3>
                        <p class="card-subtitle">{{ bouteille.description }} </p>
                        <p class=""> {{ bouteille.prix_saq }} $</p>

                        <div class="stars-flex">
                                <legend></legend>
                                <form @submit.prevent='changeNote(bouteille)'>
                                    <fieldset>
                                        <button class="stars-btn">
                                            <input class="radio" v-model="bouteille.notes" type="radio" value="1" :id="'star'+bouteille.id+1" name="rating" />
                                            <label :for="'star'+bouteille.id+1"></label>
                                        </button>
                                    </fieldset>
                                </form>

                                <form @submit.prevent='changeNote(bouteille)'>
                                    <fieldset>
                                        <button class="stars-btn">
                                            <input class="radio" v-model="bouteille.notes" type="radio" value="2" :id="'star'+bouteille.id+2" name="rating" />
                                            <label :for="'star'+bouteille.id+2" ></label>
                                        </button>
                                    </fieldset>
                                </form>

                                <form @submit.prevent='changeNote(bouteille)'>
                                    <fieldset>
                                        <button class="stars-btn">
                                            <input class="radio" v-model="bouteille.notes" type="radio" value="3" :id="'star'+bouteille.id+3" name="rating" />
                                            <label :for="'star'+bouteille.id+3" ></label>
                                        </button>
                                    </fieldset>
                                </form>

                                <form @submit.prevent='changeNote(bouteille)'>
                                    <fieldset>
                                        <button class="stars-btn">
                                            <input class="radio" v-model="bouteille.notes" type="radio" value="4" :id="'star'+bouteille.id+4" name="rating" />
                                            <label :for="'star'+bouteille.id+4" ></label>
                                        </button>
                                    </fieldset>
                                </form>

                                <form @submit.prevent='changeNote(bouteille)'>
                                    <fieldset>
                                        <button class="stars-btn">
                                            <input class="radio" v-model="bouteille.notes" type="radio" value="5" :id="'star'+bouteille.id+5" name="rating" />
                                            <label :for="'star'+bouteille.id+5" ></label>
                                        </button>
                                    </fieldset>
                                </form>
                        </div>

                        <div class="container-counter">
                                <section class="count-bouteilles">
                                    <button  class="" @click.prevent="decrement    (bouteille.id)" :disabled="bouteille.quantite < 1">-</button>
                                    <p class=""> {{ bouteille.quantite }}</p>
                                    <button  class="" @click.prevent="increment  (bouteille.id)" >+</button>
                                </section>
    
                                <button  class="card-btn_delete deleteModalBtn" value="" @click.prevent="deleteBouteille(bouteille.id)" :disabled="bouteille.quantite > 1">
                                    <IconContainer>
                                        <template #icon>
                                            <IconSupprimer/>
                                        </template>
                                    </IconContainer>
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

                <section>

                    <h3 class="card-title">{{ bouteille.nom }}</h3>
                    <p class="card-subtitle">{{ bouteille.description }} </p>
                    <p class=""> {{ bouteille.prix_saq }} $</p>

                    <div class="stars-flex">
                                <legend></legend>
                                <form @submit.prevent='changeNote(bouteille)'>
                                    <fieldset>
                                        <button class="stars-btn">
                                            <input class="radio" v-model="bouteille.notes" type="radio" value="1" :id="'star'+bouteille.id+1" name="rating" />
                                            <label :for="'star'+bouteille.id+1"></label>
                                        </button>
                                    </fieldset>
                                </form>

                                <form @submit.prevent='changeNote(bouteille)'>
                                    <fieldset>
                                        <button class="stars-btn">
                                            <input class="radio" v-model="bouteille.notes" type="radio" value="2" :id="'star'+bouteille.id+2" name="rating" />
                                            <label :for="'star'+bouteille.id+2" ></label>
                                        </button>
                                    </fieldset>
                                </form>

                                <form @submit.prevent='changeNote(bouteille)'>
                                    <fieldset>
                                        <button class="stars-btn">
                                            <input class="radio" v-model="bouteille.notes" type="radio" value="3" :id="'star'+bouteille.id+3" name="rating" />
                                            <label :for="'star'+bouteille.id+3" ></label>
                                        </button>
                                    </fieldset>
                                </form>

                                <form @submit.prevent='changeNote(bouteille)'>
                                    <fieldset>
                                        <button class="stars-btn">
                                            <input class="radio" v-model="bouteille.notes" type="radio" value="4" :id="'star'+bouteille.id+4" name="rating" />
                                            <label :for="'star'+bouteille.id+4" ></label>
                                        </button>
                                    </fieldset>
                                </form>

                                <form @submit.prevent='changeNote(bouteille)'>
                                    <fieldset>
                                        <button class="stars-btn">
                                            <input class="radio" v-model="bouteille.notes" type="radio" value="5" :id="'star'+bouteille.id+5" name="rating" />
                                            <label :for="'star'+bouteille.id+5" ></label>
                                        </button>
                                    </fieldset>
                                </form>
                    </div>

                    <div class="container-counter">

                                <section class="count-bouteilles">
                                    <button  class="" @click.prevent="decrement    (bouteille.id)" :disabled="bouteille.quantite <  1">-</button>
                                    <p class=""> {{ bouteille.quantite }}</p>
                                    <button  class="" @click.prevent="increment  (bouteille.id)" >+</button>
                                </section>

                                <button  class="card-btn_delete deleteModalBtn" value="" @click.prevent="deleteBouteille(bouteille. id)" :disabled="bouteille.                           quantite > 1">
                                    <IconContainer>
                                        <template #icon>
                                            <IconSupprimer/>
                                        </template>
                                    </IconContainer>
                                </button>

                    </div>
                    
                </section>

            </div>   
        </div>
    </section>

</template>

    
<script>

import useBouteille from '../../composables/bouteille'
import useCellier from '../../composables/cellier'
import IconContainer from "../IconContainer.vue";
import IconSupprimer from '../icons/IconSupprimer.vue';
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
                    
                    //const bouteille = oneCellier.find(b => b.id === id);
                    if (oneCellier && oneCellier.quantite === 0) {
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

          // Trier une bouteille
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
    components: {
    "IconContainer": IconContainer,
    "IconSupprimer": IconSupprimer,
}

 
}
</script>

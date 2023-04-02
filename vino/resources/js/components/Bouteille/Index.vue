<template>
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
                            <p class="card-subtitle">{{ bouteille.description }} {{ bouteille.format }}</p>
                        </div>
                        <div class="card-info-client">
                            <p class="card-count"> {{ bouteille.prix_saq }} $</p>
                            <p class="card-rating"> {{ bouteille.quantite }} bouteille</p>
                        </div> 

                        <!-- Si vous ajouter une note dans DB vous alez le voir ici -->
                        <div      v-if="bouteille.notes && bouteille.notes == 5" class="card-count" >Ma note: &#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <div v-else-if="bouteille.notes && bouteille.notes == 4" class="card-count" >Ma note: &#9733;&#9733;&#9733;&#9733;&#10025;</div>
                        <div v-else-if="bouteille.notes && bouteille.notes == 3" class="card-count" >Ma note: &#9733;&#9733;&#9733;&#10025;&#10025;</div>
                        <div v-else-if="bouteille.notes && bouteille.notes == 2" class="card-count" >Ma note: &#9733;&#9733;&#10025;&#10025;&#10025;</div>
                        <div v-else-if="bouteille.notes && bouteille.notes == 1" class="card-count" >Ma note: &#9733;&#10025;&#10025;&#10025;&#10025;</div>
                        <div v-else class="card-count" >Aucun note</div>

                        <div>
                            <label for="note-send" >Note
                                <input className="radio" type="radio" value="1" @click.prevent="addNote(1)" name="valeurNoteSend" id="" />
                                <input className="radio" type="radio" value="2" @click.prevent="addNote(2)" name="valeurNoteSend" id="" />
                                <input className="radio" type="radio" value="3" @click.prevent="addNote(3)" name="valeurNoteSend" id="" />
                                <input className="radio" type="radio" value="4" @click.prevent="addNote(4)" name="valeurNoteSend" id="" />
                                <input className="radio" type="radio" value="5" @click.prevent="addNote(5)" name="valeurNoteSend" id="note-send"/>
                            </label>
                            <button type="submit" value="submit">Envoye</button>
                        </div>

                        <div class="card-footer">
                              <button  class="card-btn_add  " @click.prevent="increment(bouteille.id)">+</button>    
                              <button  class="card-btn_supp " @click.prevent="decrement(bouteille.id)">-</button>   
                              <button  class="card-btn_modif" @click.prevent="showRate">Note</button>
                              <button  class="card-btn_modif deleteModalBtn" value="" @click.prevent="deleteBouteille(bouteille.id)" >Supprimer du cellier</button>   
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
import useCellier from '../../composables/bouteilleHasCellier'
import { onMounted, getCurrentInstance } from 'vue'

export default {

    setup() {
        
        const { mesBouteilles, getMesBouteilles, deleteBouteille, trierMesBouteilles } = useBouteille()
        const { storeNote } = useBHC()
        const { $route } = getCurrentInstance().proxy
        const { oneCellier, getOneCellier } = useCellier();

        const increment = async (id) => {
            axios.put('api/bouteille/' + id + '/increment')
                .then(response => {
                    getOneCellier($route.params.id);
                })
                .catch(error =>{
                    console.log(error.response.data.errors);
                })
        }

        const decrement = async (id) => {
            axios.put('api/bouteille/' + id + '/decrement')
                .then(response => {
                    getOneCellier($route.params.id);
                })
                .catch(error =>{
                    console.log(error.response.data.errors);
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
        

        return {
            mesBouteilles,
            oneCellier,
            getMesBouteilles,
            deleteBouteille,
            getOneCellier,
            increment,
            decrement,
            trierItem,
            storeNote
        }
    }
}
</script>
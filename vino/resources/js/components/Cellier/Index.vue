<template>
    <!-- Pour pluseur cellier TODO: ( Later ) -->
    <section>
    <div class="ajouter-cellier">
        <router-link :to="{name: 'cellier.create'}" class="ajouter-cellier__bouton">Ajouter un nouveau cellier</router-link>
    </div>
    <h2 class="liste__titre">Mes cellier</h2>
    <article class="container">
        <div class="card" v-for="unCellier in mesCellier" :key="unCellier.id">
            <router-link :to="{ name: 'bouteille.index', params: { id: unCellier.id } }">

                <div class="card-body cellier__card-body">
                    <img src="https://media.istockphoto.com/id/471642528/ru/%D0%B2%D0%B5%D0%BA%D1%82%D0%BE%D1%80%D0%BD%D0%B0%D1%8F/%D0%B0%D0%BA%D0%B2%D0%B0%D1%80%D0%B5%D0%BB%D1%8C%D0%BD%D1%8B%D0%B5-%D0%B1%D0%BE%D0%BA%D0%B0%D0%BB-%D0%BA%D1%80%D0%B0%D1%81%D0%BD%D0%BE%D0%B3%D0%BE-%D0%B2%D0%B8%D0%BD%D0%B0.jpg?s=1024x1024&w=is&k=20&c=sb0epl26InB9CDERl8RjaSRaqV8m_XDcA8qKJDw0VsE="  alt="img-bouteille">
                    <div class="cellier-info">
                        <div class="card-info-title">
                            <h3 class="cellier__card-title">{{ unCellier.nom }}</h3>
                  
                        </div>
                        <div class="card-info-client">
                            <p class="card-subtitle">{{ unCellier.description }}</p>
                  
                        </div>
                        <div class="card-footer">
                              <router-link  class="card-btn_modif " value="" :to="{}">Modifier</router-link>   
                              <button  class="card-btn_supp deleteModalBtn" value="" >-</button>   
                            </div>
                    </div>
                </div>
            </router-link>
        </div>
        <div v-if="mesCellier.length === 0">
            <p class="text-danger">Vous n'avez pas de cellier. Voulez-vous en créer un? Cliquez  <router-link :to="{name: 'cellier.create'}" >ici</router-link></p>
        </div>
    </article>
    
    <article class="container">
        <div class="card" v-for="unCellier in mesCellier" :key="unCellier.id">
            <router-link :to="{ name: 'bouteille.index', params: { id: unCellier.id } }">

                <div class="card-body cellier__card-body">
                    <img src="https://img.freepik.com/premium-photo/wine-glass-watercolor_726745-164.jpg?w=360"  alt="img-bouteille">
                    <div class="cellier-info">
                        <div class="card-info-title">
                            <h3 class="cellier__card-title">{{ unCellier.nom }}</h3>
                  
                        </div>
                        <div class="card-info-client">
                            <p class="card-subtitle">{{ unCellier.description }}</p>
                  
                        </div>
                    </div>
                </div>
            </router-link>
        </div>
        <div v-if="mesCellier.length === 0">
            <p class="text-danger">Vous n'avez pas de cellier. Voulez-vous en créer un? Cliquez  <router-link :to="{name: 'cellier.create'}" >ici</router-link></p>
        </div>
    </article>
</section>

    <!-- <router-link :to="{ name: 'bouteille.index', params: { id: unCellier.id } }">
        <div class="product-card">
            <p>Cellier: {{ unCellier.nom }}</p>
            <p>Description: {{ unCellier.description }}</p>
            <h5>Voire mes bouteilles</h5>
        </div>
        <br>
    </router-link> -->

    <!-- <a href="#" @click.prevent="deleteCatalogue(bouteille.id)">Supprimer</a> -->

</template>

<script>

import useCellier from '../../composables/cellier';
import { onMounted } from 'vue';

export default {

    // setup() {
    //     const { unCellier, getOneCellier } = useCellier()
    //     onMounted(getOneCellier)
    //     return {
    //         unCellier,
    //     }
    // }

    setup() {
        const { mesCellier, getMesCellier } = useCellier()
        onMounted(getMesCellier)
        return {
            mesCellier,
        }
    }
}

</script>
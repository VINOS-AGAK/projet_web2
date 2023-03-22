<template>

    <div class="product-grid" >
      <div class="product-card" v-for="bouteille in catalogue" :key="bouteille.id">
        <img :src="bouteille.image" alt="Product 1">
        <h3>{{bouteille.nom}}</h3>
        <p>{{bouteille.description}}</p>
        <p>{{bouteille.pays}}</p>
        <p>{{bouteille.format}}</p>
        <router-link :to="{name: 'catalogue.edit', params:{ id: bouteille.id } }">
            Modifier
        </router-link>
        <br>
        <a href="#" @click.prevent="deleteCatalogue(bouteille.id)">Supprimer</a>
    </div>
      
      
    
    
    </div>
    
    </template>
    
    <script>
    
    import useCatalogue from '../composables/catalogue'
    import { onMounted } from 'vue'
        export default{
    
            setup(){
                const { catalogue, getCatalogue, deleteCatalogue } = useCatalogue()
                onMounted(getCatalogue)
    
                return { 
                    catalogue, 
                    getCatalogue, 
                    deleteCatalogue 
                }
            }
    
        }
    </script>
    
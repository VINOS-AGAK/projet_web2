import { createRouter, createWebHistory } from 'vue-router'

import CatalogueIndex from '../components/Catalogue.vue'
import CatalogueCreate from '../components/Create.vue'
import CatalogueEdit from '../components/Edit.vue'

import CellierIndex from '../components/Cellier/Index.vue'
import CellierCreate from '../components/Cellier/Create.vue'
import CellierEdit from '../components/Cellier/Edit.vue'

import BouteilleIndex from '../components/Bouteille/Index.vue'


import AuthenticatedLayout from '../layouts/Authenticated.vue'
import GuestLayout from '../layouts/Guest.vue'

import Login from '../components/User/Login.vue'
import Register from '../components/User/Register.vue'

import Accueil from '../components/Accueil.vue'



function auth(to, from, next) {
    if(JSON.parse(localStorage.getItem('loggedIn'))) {
        next()
        return
    }
    next('/login')
}

const routes = [
    {
        path:'/',
        redirect:{ name: 'login'},
        component: GuestLayout,
        children: [
            {
                path: '/register',
                name: 'register',
                component: Register,
                meta: { title: 'Register' }
            },
            {
                path: '/login',
                name: 'login',
                component: Login,
                meta: { title: 'Login' }
            },
            {
                path: '/accueil',
                name: 'accueil',
                component: Accueil,
                meta: { title: 'Accueil' }
            }
        ]

    },
    {
        component: AuthenticatedLayout,
        beforeEnter: auth,
        children: [
            {path: '/catalogue',
            name: 'catalogue.index', 
            component: CatalogueIndex,
            meta: { title: "Catalogue"}
           },
       
           {path: '/catalogue/create',
            name: 'catalogue.create',
            component: CatalogueCreate,
            meta: { title: "Add to catalogue"} 
           },
       
           {path: '/:id',
            name: 'catalogue.edit',
            component: CatalogueEdit,
            meta: { title: "Modifier Catalogue"} 
           }
        ]
    },
    {
        component: AuthenticatedLayout,
        beforeEnter: auth,
        children: [
            {path: '/cellier',
            name: 'cellier.index',
            component: CellierIndex,
            meta: { title: "Mes cellier"}
           },
       
           {path: '/cellier/create',
            name: 'cellier.create',
            component: CellierCreate,
            meta: { title: "Ajouter un cellier"} 
           },
       
           {path: '/:id',
            name: 'cellier.edit',
            component: CellierEdit,
            meta: { title: "Modifier un cellier"} 
           }
        ]
    },
    {
        component: AuthenticatedLayout,
        beforeEnter: auth,
        children: [
            {path: '/:id',
            name: 'bouteille.index',
            component: BouteilleIndex,
            meta: { title: "Mes Bouteille"}
           }
        ]
    }

]


export default createRouter({
    history: createWebHistory(),
    routes
})
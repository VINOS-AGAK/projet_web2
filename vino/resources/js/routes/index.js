import { createRouter, createWebHistory } from 'vue-router'

import Catalogue from '../components/Catalogue.vue'
import CatalogueCreate from '../components/Create.vue'
import CatalogueEdit from '../components/Edit.vue'

import AuthenticatedLayout from '../layouts/Authenticated.vue'
import GuestLayout from '../layouts/Guest.vue'

import Login from '../components/Login.vue'



function auth(to, from, next) {
    if(JSON.parse(localStorage.getItem('loggedIn'))) {
        next()
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
                path: '/login',
                name: 'login',
                component: Login,
                meta: { title: 'Login' }
            }
        ]

    },
    {
        component: AuthenticatedLayout,
        beforeEnter: auth,
        children: [
            {path: '/catalogue',
            name: 'catalogue.index', 
            component: Catalogue,
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
    }

]


export default createRouter({
    history: createWebHistory(),
    routes
})
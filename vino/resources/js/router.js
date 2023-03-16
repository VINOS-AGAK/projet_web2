import VueRouter from "vue-router";

import Vue from 'vue';

Vue.use(VueRouter);

import Welcome from "./views/Welcome";
import cellier from "./views/Cellier";
import login from "./views/auth/Index";
import Catalogue from "./views/catalogue/Catalogue";
import BouteilleCellier from "./views/cellier/BouteilleCellier";

const routes = [
    {
        path: "/",
        component: Welcome
    },
    {
        path: "/cellier",
        component: cellier
    },
    {
        path: "/login",
        component: login
    },
    {
        path: "/catalogue",
        component: Catalogue
    },
    {
        path: "/bouteille-cellier",
        component: BouteilleCellier
    }
]

export default new VueRouter({
    mode: "history",
    routes
});

import VueRouter from "vue-router";

import Vue from 'vue';

Vue.use(VueRouter);

import Welcome from "./views/Welcome";
import cellier from "./views/Cellier";
import login from "./views/auth/Index";

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
    }
]

export default new VueRouter({
    mode: "history",
    routes
});

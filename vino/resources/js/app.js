/**
 * Tout d’abord, nous allons charger toutes les dépendances JavaScript de ce projet qui
 * comprend Vue et d’autres bibliothèques. C’est un excellent point de départ lorsque
 * construire des applications Web robustes et puissantes en utilisant Vue et Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * Le bloc de code suivant peut être utilisé pour enregistrer automatiquement votre
 * Composants de Vue. Il analysera récursivement ce répertoire pour Vue
 * les composants et les enregistrer automatiquement avec leur "nom de base".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('header-component', require('./components/Header.vue').default);
 

/**
 * Ensuite, nous allons créer une nouvelle instance d’application Vue et la joindre à
 * la page. Ensuite, vous pouvez commencer à ajouter des composants à cette application
 * ou personnaliser l’échafaudage JavaScript pour répondre à vos besoins uniques.
 */
import "../../public/css/style.css";

import router from "./router"

const app = new Vue({
    el: '#app',
    router
});

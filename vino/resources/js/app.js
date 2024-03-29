import './bootstrap';

import { createApp, onMounted } from 'vue';
import router from './routes/index'
import VueSweetalert2 from "vue-sweetalert2";
import 'sweetalert2/dist/sweetalert2.min.css';
import useAuth from "./composables/auth";
import Vue from 'vue';

import App from './layouts/Authenticated.vue'



// const app = createApp({App});
// const { getUser } = useAuth()
// onMounted(getUser)

const app = createApp({
    setup() {
        const { getUser } = useAuth()
        onMounted(getUser)
    }
})


app.use(router)
app.use(VueSweetalert2)

app.mount('#app')
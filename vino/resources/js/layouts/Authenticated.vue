<template>
    <nav class="container-header">
        <!-- Primary Navigation Menu -->
        <div class="site-header">
            <div class="site-header-content">
                <ul class="menu">
                    <!-- Logo -->
                    <li class="menu-item">
                        <a href="/Accueil">
                            <IconContainer>
                                <template #icon>
                                    <IconLogo/>
                                </template>
                            </IconContainer>
                        </a>
                    </li>

                    <li class="menu-item">
                        <router-link :to="{ name: 'catalogue.index' }" active-class="border-b-2 border-indigo-400" class="">
                            <IconContainer>
                                <template #icon>
                                    <IconBouteille/>
                                </template>
                            </IconContainer>
                        </router-link>
                    </li>

                    <li class="menu-item">
                        <router-link :to="{ name: 'cellier.index' }" active-class="border-b-2 border-indigo-400" class="">
                            <IconContainer>
                                <template #icon>
                                    <IconCellier/>
                                </template>
                            </IconContainer>
                        </router-link>
                    </li>

                    <li class="menu-item">
                        <div v-if="user" class="menu-username">{{ user.name }}</div>
                        <button @click="logout" type="button" >
                            <IconContainer>
                                <template #icon>
                                    <IconProfil/>
                                </template>
                             </IconContainer>
                        </button>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        <div class="">
            <router-view></router-view>
        </div>
    </main>

</template>

<script>
import { onMounted } from "vue";
import useAuth from "../composables/auth";
// Importation du composant Icons
import IconLogo from '../components/icons/IconLogo.vue';
import IconProfil from '../components/icons/IconProfil.vue';
import IconCellier from '../components/icons/IconCellier.vue';
import IconCellier2 from '../components/icons/IconCellier2.vue';
import IconBouteille from '../components/icons/IconBouteille.vue';
import IconSearch from '../components/icons/IconSearch.vue';
import IconContainer from "../components/IconContainer.vue";

export default { 

    setup() {
        // Utilisation du composant composable useAuth pour récupérer les informations utilisateur
        const { user, processing, logout, getUser } = useAuth()

        // Appel de la méthode getUser au chargement de la page
        onMounted(getUser)
        return { user, processing, logout }
    },
    computed: {
         // Définition d'un calcul de propriété pour récupérer le titre de la page courante
        currentPageTitle() {
            return this.$route.meta.title;
        }
    },
    // Définition des composants pour les utiliser dans le template
    components: {
        'IconContainer': IconContainer,
        'IconLogo': IconLogo,
        'IconProfil': IconProfil,
        'IconCellier': IconCellier,
        'IconCellier2': IconCellier2,
        'IconBouteille': IconBouteille,
        'IconSearch': IconSearch,
    }
}
</script>
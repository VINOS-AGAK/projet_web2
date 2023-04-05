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
                        VINOCELLO
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

    <div>
        <router-view></router-view>
    </div>

</template>

<script setup>
import IconLogo from '../components/icons/IconLogo.vue';
import IconContainer from "../components/IconContainer.vue";

</script>




<template>

        <nav class="container-header">
            <!-- Primary Navigation Menu -->

                <div class="site-header">
                    <div class="site-header-content">
                        <!-- Logo -->
                            <a href="/">catalogue</a>
                        <!-- Navigation Links -->
                            <router-link :to="{ name: 'catalogue.index' }" active-class="border-b-2 border-indigo-400" class="">
                                Posts
                            </router-link>
                            <router-link :to="{ name: 'catalogue.create' }" active-class="border-b-2 border-indigo-400" class="">
                                Create Post
                            </router-link>
                            <router-link :to="{ name: 'cellier.index' }" active-class="border-b-2 border-indigo-400" class="">
                                Cellier Index
                            </router-link>
                            <router-link :to="{ name: 'cellier.create' }" active-class="border-b-2 border-indigo-400" class="">
                                Cellier create
                            </router-link>

                    </div>
                    <div class="">
                        <div>
                            <div>Hi, {{ user.name }}</div>
                            <div class="text-sm text-gray-500">{{ user.email }}</div>
                        </div>
                    </div>
                    <button @click="logout" type="button" >

                        <IconContainer>
                            <template #icon>
                                <IconLogo/>
                            </template>
                        </IconContainer>
                        logout
                    </button>

                </div>

        </nav>
        <!-- Page Heading -->

        <h2 class="">
            {{ currentPageTitle }}
        </h2>


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
import IconContainer from "../components/IconContainer.vue";
import IconProfil from "../components/icons/IconProfil.vue";
import IconLogo from "../components/icons/IconLogo.vue";

export default {
    setup() {
        const { user, processing, logout, getUser } = useAuth()
        onMounted(getUser)
        return { user, processing, logout }
    },
    computed: {
        currentPageTitle() {
            return this.$route.meta.title;
        }
    }
}
</script>
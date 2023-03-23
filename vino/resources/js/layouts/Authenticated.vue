<template>

        <nav class="site-header">
            <!-- Primary Navigation Menu -->

                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="/">
                                catalogue
                            </a>
                        </div>
                        <!-- Navigation Links -->
                        <div class="">
                            <router-link :to="{ name: 'catalogue.index' }" active-class="border-b-2 border-indigo-400" class="">
                                Posts
                            </router-link>
                            <router-link :to="{ name: 'catalogue.create' }" active-class="border-b-2 border-indigo-400" class="">
                                Create Post
                            </router-link>
                        </div>
                    </div>
                    <div class="">
                        <div>
                            <div>Hi, {{ user.name }}</div>
                            <div class="text-sm text-gray-500">{{ user.email }}</div>
                        </div>
                    </div>
                    <button @click="logout" type="button" >
                        Log out
                    </button>
                </div>

        </nav>
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ currentPageTitle }}
                </h2>
            </div>
        </header>
        <!-- Page Content -->
        <main>
            <div class="py-12">
                <div class="w-full sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <router-view></router-view>
                        </div>
                    </div>
                </div>
            </div>
        </main>

</template>

<script>
import { onMounted } from "vue";
import useAuth from "../composables/auth";

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
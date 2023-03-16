<template>
    <nav main-nav>
        <ul>
            <li v-for="link in links">
                <router-link class="btn" :to="link.href">{{ link.title }}</router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    data() {
        return {
            links: [
                {
                    title: "Home page",
                    href: "/"
                },
                {
                    title: "Welcome",
                    href: "/welcome"
                }
            ]
        }
    }
}
</script>

<style scoped></style>






<!-- <template>
    <nav>
        <div v-for="link in links">
            <a :href="link.href">{{ link.title }}</a>
        </div>
    </nav>
</template>

<script>
export default {
    links: [
        {
            title: "Welcome",
            href: "/"
        },
        {
            title: "Catalogue",
            href: "/catalogue"
        }
    ]
}
</script>

<style scoped></style> -->

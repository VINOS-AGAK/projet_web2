<script setup>
import IconLogo from '../components/icons/IconLogo.vue';
import IconContainer from "../components/IconContainer.vue";

</script>

<template>

    <nav class="site-header">
        <ul>
            <li class="liste-item">
                <a href="/">
                    <IconContainer>
                        <template #icon>
                            <IconLogo />
                        </template>
                    </IconContainer>
                </a>
            </li>
        </ul>
    </nav>

    <div>
        <router-view></router-view>
    </div>

</template>


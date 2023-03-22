<template>
    <div class="accueil-container">
        <div class="accueil-overlay">

          <h1 class="accueil-titre">Bienvenue pour ecrire du texte ici</h1>
          <p class="accueil-paragraph">et isi 2</p>
          <router-link  to="/cellier"> <button class="accueil-button">Cellier pour l’instant. Connexion ultérieure</button> </router-link>

          <h1 class="accueil-titre">@lang('lang.hello') </h1>
          <p class="accueil-paragraph">@lang('lang.slogan')</p>
          <button class="accueil-button"><a  href="">@lang('lang.mes_cellier')</a></button>

        </div>
    </div>
</template>

<script>
export default {

    name: "welcome"
}
</script>

<style scoped>

</style>
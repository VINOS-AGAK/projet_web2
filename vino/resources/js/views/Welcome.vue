<template>
    <div class="accueil-container">
        <div class="accueil-overlay">

          <h1 class="accueil-titre">Welcome make text here</h1>
          <p class="accueil-paragraph">and here2</p>
          <router-link  to="/cellier"> <button class="accueil-button">Cellier for now. Login later</button> </router-link>

          <!-- <h1 class="accueil-titre">@lang('lang.hello') {{ $name }}</h1>
          <p class="accueil-paragraph">@lang('lang.slogan')</p>
          <button class="accueil-button"><a  href="{{ route('liste-bouteilles')}}">@lang('lang.mes_cellier')</a></button> -->

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
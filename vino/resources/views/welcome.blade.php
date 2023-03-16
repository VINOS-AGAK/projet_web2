@extends('layouts.app')

@section('content') 
      
    <div class="accueil-container">
        <div class="accueil-overlay">
        
          @guest
          
          <h1 class="accueil-titre">@lang('lang.welcome') @lang('lang.guest')</h1>
          <p class="accueil-paragraph">@lang('lang.introduction')</p>
          <button class="accueil-button"><a  href="home">@lang('lang.login')</a></button>
         
          @else

          <h1 class="accueil-titre">@lang('lang.hello') {{ $name }}</h1>
          <p class="accueil-paragraph">@lang('lang.slogan')</p>
          <button class="accueil-button"><a  href="/cellier">@lang('lang.mes_cellier')</a></button>
          
          @endguest 
          
        </div>
    </div>
@endsection







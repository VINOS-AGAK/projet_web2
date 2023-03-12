@extends('layouts.app')
@section('content') 
      
       <div class="accueil-container">
        <div class="accueil-overlay">
           @guest
          <h1 class="accueil-titre">Welcome Guest</h1>
          <p>Notre page principale de projet Vino-AGAK</p>
          <button class="accueil-button">Se connecter</button>
          @else
          <h1 class="accueil-titre">Welcome {{ $name }}</h1>
          <p class="accueil-paragraph">Ton vin a soif de toi</p>
          <a class="accueil-button" href="{{ route('liste-bouteilles') }}">Voir cellier</a>
          @endguest 
          
        </div>
    </div>
@endsection





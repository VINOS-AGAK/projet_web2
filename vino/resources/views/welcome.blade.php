
 





@extends('layouts.app')
@section('content') 
      
       <div class="welcome-container">
        <div class="welcome-overlay">
           @guest
          <h1>Welcome Guest</h1>
          @else
          <h1>Welcome {{ $name }}</h1>
          @endguest 
          <p>Notre page principale de projet Vino-AGAK</p>
          <button class="welcome-button">Enregistrer</button>
        </div>
    </div>
@endsection





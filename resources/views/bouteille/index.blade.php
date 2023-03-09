@extends('layouts.app')
@section('title', 'Catalogue de Bouteilles')
@section('content') 
         
                
<div class="card-header">
    Catalogue de bouteilles
</div>


<body>
  @forelse($bouteilles as $bouteille)
  <div class="catalogue-container">
    <div class="catalogue-image">
      <img src="{{ asset($bouteille->image)}}" alt="nom vin" />
    </div>
    <div class="catalogue-description">
      <h1>{{ $bouteille->nom }}</h1>
      <ul>
        <li>{{ $bouteille->date }}</li>
        <li class="li-divider sous-titre">{{ $bouteille->nom }}</li>
        <li class="li-divider">Description: {{ $bouteille->description }}</li>
        <li class="li-divider sous-titre">Pays : {{ $bouteille->pays }}</li> 
        <li>Type :  </li>
        <li>Prix : {{ $bouteille->prix_saq }} $</li>
        <li>Format : {{ $bouteille->format }}</li>
        <div>
          <a class="btn" href="{{ $bouteille->url_saq }}">Voir SAQ</a>
        </div>
      </ul>
    </div>
  </div>
  @empty
  <div class="catalogue-container">
    <ul>
      <li class="text-danger">Aucune bouteilles disponible dans le catalogue</li>
    </ul>
  </div>
  @endforelse
  {{$bouteilles}}
</body>

                        
                   
               
            
        






@endsection
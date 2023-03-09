@extends('layouts.app')
@section('title', 'Catalogue de Bouteilles')
@section('content') 
         
                
<div class="card-header">
    Catalogue de bouteilles
</div>


<body>
  @forelse($catalogue as $catalogue)
  <div class="catalogue-container">
    <div class="catalogue-image">
      <img src="{{ asset($catalogue->image)}}" alt="nom vin" />
    </div>
    <div class="catalogue-description">
      <h1>{{ $catalogue->nom }}</h1>
      <ul>
        <li>{{ $catalogue->date }}</li>
        <li class="li-divider sous-titre">{{ $catalogue->nom }}</li>
        <li class="li-divider">Description: {{ $catalogue->description }}</li>
        <li class="li-divider sous-titre">Pays : {{ $catalogue->pays }}</li> 
        <li>Type :  </li>
        <li>Prix : {{ $catalogue->prix_saq }} $</li>
        <li>Format : {{ $catalogue->format }}</li>
        <div>
          <a class="btn" href="{{ $catalogue->url_saq }}">Voir SAQ</a>
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
  {{$catalogue}}
</body>

                        
                   
               
            
        






@endsection
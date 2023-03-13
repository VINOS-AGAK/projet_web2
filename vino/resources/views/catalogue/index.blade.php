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
      <img src="{{ asset($catalogue->image)}}" alt="{{ $catalogue->nom }}" />
    </div>
    <div class="catalogue-description">
      <h1>{{ $catalogue->nom }}</h1>
      <ul>
        <li class="li-divider sous-titre">{{ $catalogue->nom }}</li>
        <li class="li-divider">Description: {{ $catalogue->description }}</li>
        <li class="li-divider sous-titre">Pays : {{ $catalogue->pays }}</li> 
        <li>Prix : {{ $catalogue->prix_saq }} $</li>
        <li>Format : {{ $catalogue->format }}</li>
        <div>
          @guest
          <a class="btn" href="{{ $catalogue->url_saq }}">Voir SAQ</a>
          @else
          <a class="btn" href="{{ $catalogue->url_saq }}">Voir SAQ</a>
          <form method="POST" action="{{ route('bouteille.store', $catalogue->id) }}">
            @csrf
          <button type="submit" class="btn">Add</button>
          </form>
          @endguest
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
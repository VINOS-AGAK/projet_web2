@extends('layouts.app')
@section('title', 'Liste des Bouteilles du Cellier')
@section('content') 
         
                
<div class="card-header">
    Liste des bouteilles du Cellier 
</div>


<body>
  @forelse($bouteilles as $bouteille)
  <div class="catalogue-container">
    <div class="catalogue-image">
      <img src="{{ asset($bouteille->image)}}" alt="{{ $bouteille->nom }}" />
    </div>
    <div class="catalogue-description">
      <h1>{{ $bouteille->nom }}</h1>
      <ul>
        <li class="li-divider sous-titre">{{ $bouteille->nom }}</li>
        <li class="li-divider">Description: {{ $bouteille->description }}</li>
        <li class="li-divider sous-titre">Pays : {{ $bouteille->pays }}</li> 
        <li>Type :  </li>
        <li>Prix : {{ $bouteille->prix_saq }} $</li>
        <li>Format : {{ $bouteille->format }}</li>
      </ul>
    </div>
    <!--Button to trigger modal-->
    <button class="btn deleteModalBtn" data-id="{{ $bouteille->id}}" data-dialog-id="deleteModal_{{ $bouteille->id }}">
        Delete
    </button>
                            
    <!-- Modal -->
    <dialog  class="deleteModal" id="deleteModal_{{ $bouteille->id }}" >
      <div>
        <div>
          <div>
            <h1 >Supprimer une bouteille du cellier</h1>
          </div>
          <div>
            Voulez vous vraiment effacer cette bouteille {{ $bouteille->nom }}?
          </div>
          <div>
            <button data-dialog-id="deleteModal_{{ $bouteille->id }}" class="btn closeDeleteModal">Annuler</button>
            <form action="{{ route('delete', $bouteille->id)}}" method="post">
              @csrf
              @method('delete')
                <input type="submit" class="btn btn-danger" value="Effacer">
            </form>
          </div>
        </div>
      </div>
    </dialog> 
  </div>
  @empty
  <div class="catalogue-container">
    <ul>
      <li class="text-danger">Aucune bouteilles disponible dans le cellier</li>
    </ul>
  </div>
  @endforelse

</body>

              
               

@endsection
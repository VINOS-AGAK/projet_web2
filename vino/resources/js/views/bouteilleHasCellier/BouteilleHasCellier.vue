<template>
    <div class="container">

        
        <div class="card">
            <div class="card-body">
                <img src="{{ asset($bouteille->image)}}" alt="{{ $bouteille->nom }}">
                <picture class="modal"><img src="{{ asset($bouteille->image) }}" alt="img"></picture>
                <div class="card-info">
                    <div class="card-info-title">
                        <h3 class="card-title">{{ $bouteille->nom }}</h3>
                        <p class="card-subtitle">White wine {{ $bouteille->format }}</p>
                        <p class="card-subtitle">{{ $bouteille->pays }}</p>
                    </div>
                    <div class="card-info-client">
                        <p class="card-count">Prix : {{ $bouteille->prix_saq }} $</p>
                        <p class="card-rating">Note: &#9733;&#9733;&#9733;&#10025;</p>
                        <div class="card-footer">
                          <button  class="card-btn_add " value="">+</button>   
                          <button  class="card-btn_add deleteModalBtn" value="" data-id="{{ $bouteille->id}}" data-dialog-id="deleteModal_{{ $bouteille->id }}">-</button>   
                    </div>
                    </div>  
                </div> 
            
            </div>

              
        </div>
        <!-- @empty -->
        <div class="catalogue-container">
            <ul>
                <li class="text-danger">Aucune bouteilles disponible dans le cellier</li>
            </ul>
        </div>
        <!-- @endforelse -->

</div>
</template>
@extends('layouts.app')
@section('content')

<nav>
  <div class="menu-cellier-container">
    <a href="{{ route('cellier.create') }}" class="flower-button">
      <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
        <path d="M12 21.85q0-1.8.7-3.4.7-1.6 1.9-2.8 1.2-1.2 2.8-1.9 1.6-.7 3.4-.7 0 1.8-.7 3.4-.7 1.6-1.9 2.8-1.2 1.2-2.8 1.9-1.6.7-3.4.7Zm2.275-2.275q1.5-.525 2.612-1.637 1.113-1.113 1.638-2.613-1.475.525-2.6 1.637-1.125 1.113-1.65 2.613ZM12 21.85q0-1.8-.7-3.4-.7-1.6-1.9-2.8-1.2-1.2-2.8-1.9-1.6-.7-3.4-.7 0 1.8.7 3.4.7 1.6 1.9 2.8 1.2 1.2 2.8 1.9 1.6.7 3.4.7Zm-2.275-2.275q-1.5-.525-2.613-1.637Q6 16.825 5.475 15.325q1.5.525 2.613 1.637 1.112 1.113 1.637 2.613Zm5.625-8.45q.5 0 .862-.35.363-.35.363-.85 0-.375-.2-.65t-.525-.425l-.95-.475q-.1.575-.375 1.063-.275.487-.725.862l.875.625q.125.1.3.15.175.05.375.05ZM14.9 7.6l.95-.45q.325-.175.513-.463.187-.287.187-.612 0-.5-.35-.863-.35-.362-.85-.362-.2 0-.362.062-.163.063-.313.163l-.9.625q.45.35.738.825Q14.8 7 14.9 7.6Zm-3.975-2.325q.275-.1.55-.162.275-.063.525-.063.275 0 .538.063.262.062.537.162l.15-1.225q.05-.475-.338-.8-.387-.325-.887-.325-.475 0-.863.325-.387.325-.337.8ZM12 9.05q.45 0 .763-.3.312-.3.312-.75t-.312-.762q-.313-.313-.763-.313t-.75.313q-.3.312-.3.762t.3.75q.3.3.75.3Zm0 4q.5 0 .887-.325.388-.325.338-.775l-.15-1.25q-.275.125-.537.175-.263.05-.538.05-.25 0-.525-.05t-.55-.175l-.125 1.25q-.05.45.337.775.388.325.863.325ZM9.1 7.6q.1-.6.388-1.075.287-.475.712-.825l-.875-.625q-.125-.125-.3-.175-.175-.05-.375-.05-.5 0-.85.362-.35.363-.35.863 0 .325.188.612.187.288.512.463Zm-.45 3.5q.2 0 .362-.038.163-.037.338-.162l.9-.6q-.475-.375-.762-.838Q9.2 9 9.1 8.375l-.95.475q-.325.15-.5.45-.175.3-.175.625.025.5.35.837.325.338.825.338ZM12 14.925q-.975 0-1.75-.538-.775-.537-1.125-1.412-.1 0-.225.013-.125.012-.25.012-1.275 0-2.175-.9-.9-.9-.9-2.175 0-.525.175-1.013.175-.487.525-.912-.325-.425-.5-.925t-.175-1q0-1.275.888-2.188.887-.912 2.162-.912.125 0 .25.012.125.013.225.013.35-.875 1.125-1.413.775-.537 1.75-.537t1.75.537q.775.538 1.125 1.413.125 0 .238-.013.112-.012.237-.012 1.275 0 2.175.912.9.913.9 2.188 0 .5-.175 1T17.725 8q.325.425.513.912.187.488.187 1.013 0 1.275-.9 2.175-.9.9-2.175.9-.125 0-.237-.012-.113-.013-.238-.013-.35.875-1.125 1.412-.775.538-1.75.538Zm0-9.875Zm1.775.65Zm.025 4.6Zm-1.8.625Zm-1.75-.625Zm-.05-4.6Zm-.475 13.875Zm4.55 0Z" />
      </svg>
    </a>
    <a href="" class="cellier-button">
      <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
        <path d="M2.8 19.95V8.725Q2.375 8.45 2.087 8 1.8 7.55 1.8 6.9V4.075q0-.95.662-1.613.663-.662 1.613-.662h15.85q.95 0 1.613.662.662.663.662 1.613V6.9q0 .65-.287 1.1-.288.45-.713.725V19.95q0 .95-.662 1.612-.663.663-1.613.663H5.075q-.95 0-1.612-.663Q2.8 20.9 2.8 19.95ZM5.075 9.175V19.95h13.85V9.175ZM19.925 6.9V4.075H4.075V6.9ZM8.9 14.075h6.2v-2.1H8.9ZM5.075 19.95V9.175 19.95Z" />
      </svg>
    </a>
    <a href="" class="search-button">
      <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
        <path d="m19.45 21.325-6.3-6.3q-.725.55-1.675.85-.95.3-2.05.3-2.775 0-4.712-1.937Q2.775 12.3 2.775 9.525q0-2.775 1.938-4.713Q6.65 2.875 9.425 2.875q2.775 0 4.712 1.937 1.938 1.938 1.938 4.713 0 1.1-.313 2.05-.312.95-.837 1.65l6.325 6.325ZM9.425 13.65q1.725 0 2.925-1.2 1.2-1.2 1.2-2.925 0-1.725-1.2-2.925-1.2-1.2-2.925-1.2Q7.7 5.4 6.5 6.6 5.3 7.8 5.3 9.525q0 1.725 1.2 2.925 1.2 1.2 2.925 1.2Z" />
      </svg>
    </a>

    <a href="" class="profile-button">
      <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
        <path d="M12 11.9q-1.75 0-2.975-1.238Q7.8 9.425 7.8 7.7q0-1.75 1.225-2.975T12 3.5q1.75 0 2.975 1.225T16.2 7.7q0 1.725-1.225 2.962Q13.75 11.9 12 11.9Zm-8.2 8.4v-3q0-.925.463-1.675.462-.75 1.237-1.15 1.575-.8 3.2-1.188 1.625-.387 3.3-.387 1.675 0 3.3.387 1.625.388 3.2 1.163.775.4 1.238 1.163.462.762.462 1.687v3Zm2.275-2.275h11.85v-.7q0-.275-.137-.5-.138-.225-.363-.325-1.3-.675-2.663-1-1.362-.325-2.762-.325t-2.762.325q-1.363.325-2.663 1-.225.1-.362.325-.138.225-.138.5ZM12 9.625q.8 0 1.363-.563.562-.562.562-1.362t-.562-1.363Q12.8 5.775 12 5.775t-1.362.562q-.563.563-.563 1.363t.563 1.362q.562.563 1.362.563ZM12 7.7Zm0 10.325Z" />
      </svg>
    </a>
  </div>
</nav>


  <h4>Cellier {{ $name }}</h4>
  <!-- search bar -->
  <form class="search  liste-search ">
    <input placeholder="recherche dans cellier" type="search">
    <button type="submit" class="search-button" value="Submit">Search</button>
  </form>

  <!-- wine list -->
<div class="container">
  
  @foreach($bouteilles as $bouteille)
  <div class="card">
        <div class="card-body">

            <img src="{{ asset($bouteille->image) }}" alt="Product Image">
            <picture class="modal"><img src="{{ asset($bouteille->image) }}" alt="img"></picture>
            
            <div class="card-info">
            
                <div class="card-info-title">
                    <h3 class="card-title">{{ $bouteille->name }}</h3>
                    <!-- <p class="card-subtitle">White wine 750 ml</p> -->
                    <p class="card-subtitle">{{ $bouteille->description }}</p>
                </div>
                
                <div class="card-info-client">
                    <p class="card-count">Quantite:{{ $bouteille->quantity }}</p>
                    <p class="card-rating">Note: &#9733;&#9733;&#9733;&#10025;</p>
                    <p class="card-rating">Date d'ajoute:  {{ $bouteille->created_at }}</p>
                </div>
               
            </div>
           
        </div>
    
  @endforeach


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
                    
                </div>
               
            </div>
           
        </div>
        
        <div class="card-footer">
            <button  class="card-btn deleteModalBtn" value="" data-id="{{ $bouteille->id}}" data-dialog-id="deleteModal_{{ $bouteille->id }}">Drink</button>
            <button  class="card-btn" value="">Add</button>
        </div>
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
    
    <div class="card">
        <div class="card-body">

            <img src="{{ asset('img/vin2.png')}}" alt="Product Image">
            <picture class="modal"><img src="{{ asset('img/vin2.png')}}" alt="img"></picture>
            <div class="card-info">
            
                <div class="card-info-title">
                    <h3 class="card-title">Riesling Pinot gris Mosel</h3>
                    <p class="card-subtitle">White wine 750 ml</p>
                </div>
                
                <div class="card-info-client">
                
                    <div>
                    <p class="card-count">Quantite: 10 <button  class="card-btn_add" value="">&#8679;</button></p>
                    </div>
                    <p class="card-rating">Note: &#9733;&#9733;&#9733;&#10025;</p>
                    
                </div>
          
            </div>
            
        </div>
        
        <div class="card-footer">
            <button  class="card-btn" value="">Drink</button>
        </div>
 
    </div>
    
    
 </div>

</div>


@endsection
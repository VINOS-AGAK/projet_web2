

@extends('layouts.app')
@section('content')
<div class="liste-container">

  <form class="search  liste-search ">
              <input  placeholder="recherche dans cellier" type="search">
              <button type="submit" class="search-button">
                
              </button>
  </form>
	<div class="container">
		<div class="card">
			<img src="{{ asset('img/vin2.png')}}" alt="Product Image">
			<div class="card-info">
        <div class="card-info-title">

          <h3 class="card-title">Riesling  Pinot gris Mosel</h3>
          <p class="card-subtitle">White wine 750 ml</p>
        </div>
        <div class="card-info-client">
          
          <p class="card-count">Quantite:: 10 </p>
          <p class="card-rating">Note: &#9733;&#9733;&#9733;&#10025;</p>
        </div>
			</div>
		</div>
    <div class="card">
			<img src="{{ asset('img/vin2.png')}}" alt="Product Image">
			<div class="card-info">
        <div class="card-info-title">

          <h3 class="card-title">Riesling  Pinot gris Mosel</h3>
          <p class="card-subtitle">White wine 750 ml</p>
          </div>
          <div class="card-info-client">
          
          <p class="card-count">Quantite:: 10 </p>
          <p class="card-rating">Note: &#9733;&#9733;&#9733;&#10025;</p>
        </div>
			</div>
		</div>
    <div class="card">
			<img src="{{ asset('img/vin2.png')}}" alt="Product Image">
			<div class="card-info">
        <div class="card-info-title">
            
            <h3 class="card-title">Riesling  Pinot gris Mosel</h3>
            <p class="card-subtitle">White wine 750 ml</p>
            </div>
            <div class="card-info-client">
            
            <p class="card-count">Quantite:: 10 </p>
            <p class="card-rating">Note: &#9733;&#9733;&#9733;&#10025;</p>
         </div>
			</div>
		</div>

		
	</div>
</div>



@endsection
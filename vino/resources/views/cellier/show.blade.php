@extends('layouts.app')

@section('content')


<div class="product-container">
      <div class="product-image">
        <img src="{{ asset('img/vin2.png')}}" alt="nom vin" />
      </div>
      <div class="product-description">
        <h1>Riesling  Pinot gris Mosel</h1>
        <ul>
          <li> 2017</li>
          <li class="li-divider soutitle"  >White wine 750 ml</li>
          <li class="li-divider">Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat numquam qui</li>
          <li class="li-divider soutitle">Italy</li> 
          <li>Date d'achat: 1 mars 2023 </li>
          <li>Prix: $20</li>
          <li>Quantite: 10</li>
        </ul>
        <div>
        <a class="btn" href="#">Voir SAQ</a>
        </div>
      </div>
</div>

@endsection
<!-- сделать страницу карточек всех продуктов  (6 бутылок вина), должна быть картинка-слева, справа:-название и тип вина вверху,   количество бутылок и оценка внизу -->

@extends('layouts.app')
@section('content')

<div class="product-card">
  <div class="product-image">
    <img src="image-path" alt="Wine bottle">
  </div>
  <div class="product-info">
    <h2 class="product-name">Название вина</h2>
    <p class="product-type">Тип вина</p>
    <div class="product-rating">
      <span class="rating-value">Оценка</span>
      <span class="rating-max">/5</span>
    </div>
    <p class="product-quantity">Количество бутылок</p>
  </div>
</div>

@endsection
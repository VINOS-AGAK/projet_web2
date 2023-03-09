<!-- сделать страницу карточек всех продуктов  (6 бутылок вина), должна быть картинка-слева, справа:-название и тип вина вверху,   количество бутылок и оценка внизу -->

@extends('layouts.app')
@section('content')

<!-- <div class="product-card">
  <div class="product-image">
    <img src="{{ asset('img/vin2.png')}}" alt="Wine bottle">
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
</div> -->

<!-- <div class="card">
  <img src="wine1.jpg" alt="Wine 1">
  <div class="info">
    <h3>Название вина</h3>
    <p>Тип вина</p>
    <p>Количество бутылок: 1</p>
    <p>Оценка: 4.5 звезды</p>
  </div>
</div>

<div class="card">
  <img src="wine2.jpg" alt="Wine 2">
  <div class="info">
    <h3>Название вина</h3>
    <p>Тип вина</p>
    <p>Количество бутылок: 1</p>
    <p>Оценка: 4.2 звезды</p>
  </div>
</div>

<div class="card">
  <img src="wine3.jpg" alt="Wine 3">
  <div class="info">
    <h3>Название вина</h3>
    <p>Тип вина</p>
    <p>Количество бутылок: 1</p>
    <p>Оценка: 4.9 звезды</p>
  </div>
</div>

<div class="card">
  <img src="wine4.jpg" alt="Wine 4">
  <div class="info">
    <h3>Название вина</h3>
    <p>Тип вина</p>
    <p>Количество бутылок: 1</p>
    <p>Оценка: 4.8 звезды</p>
  </div>
</div>

<div class="card">
  <img src="wine5.jpg" alt="Wine 5">
  <div class="info">
    <h3>Название вина</h3>
    <p>Тип вина</p>
    <p>Количество бутылок: 1</p>
    <p>Оценка: 4.6 звезды</p>
  </div>
</div>

<div class="card">
  <img src="wine6.jpg" alt="Wine 6">
  <div class="info">
    <h3>Название вина</h3>
    <p>Тип вина</p>
    <p>Количество бутылок: 1</p>
    <p>Оценка: 4.4 звезды</p>
  </div>
</div> -->



	<div class="container">
		<div class="card">
			<img src="{{ asset('img/vin2.png')}}" alt="Product Image">
			<div class="card-info">
				<h3 class="card-title">Название продукта</h3>
				<p class="card-subtitle">Тип продукта</p>
				<p class="card-count">Количество: 10 бутылок</p>
				<p class="card-rating">Оценка: 4.5 звезды</p>
			</div>
		</div>
    <div class="card">
			<img src="{{ asset('img/vin2.png')}}" alt="Product Image">
			<div class="card-info">
				<h3 class="card-title">Название продукта</h3>
				<p class="card-subtitle">Тип продукта</p>
				<p class="card-count">Количество: 10 бутылок</p>
				<p class="card-rating">Оценка: 4.5 звезды</p>
			</div>
		</div>
    <div class="card">
			<img src="{{ asset('img/vin2.png')}}" alt="Product Image">
			<div class="card-info">
				<h3 class="card-title">Название продукта</h3>
				<p class="card-subtitle">Тип продукта</p>
				<p class="card-count">Количество: 10 бутылок</p>
				<p class="card-rating">Оценка: 4.5 звезды</p>
			</div>
		</div>

		<!-- Вставьте здесь дополнительные карточки продуктов -->
	</div>



@endsection
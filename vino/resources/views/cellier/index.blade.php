@extends('layouts.app')
@section('content')



@foreach($bouteilles as $bouteille)
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ asset($bouteille->image) }}" class="card-img" alt="{{ $bouteille->nom }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $bouteille->name }}</h5>
                    <p class="card-text">{{ $bouteille->description }}</p>
                    <p class="card-text"><small class="text-muted">Quantity: {{ $bouteille->quantity }}</small></p>
                    <p class="card-text"><small class="text-muted">Added on: {{ $bouteille->created_at }}</small></p>
                </div>
            </div>
        </div>
    </div>
@endforeach




	<!-- <div class="container">
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

		Вставьте здесь дополнительные карточки продуктов
	</div> -->



@endsection
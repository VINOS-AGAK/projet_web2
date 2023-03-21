
@extends('layouts.app')

@section('content')
    <div class="accueil-container">
        <div class="accueil-overlay">

            <p class="accueil-paragraph">Accès à mon cellier</p>
            <button class="accueil-button"><a href="/cellier">@lang('lang.mes_cellier')</a></button>

        </div>
    </div>

    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

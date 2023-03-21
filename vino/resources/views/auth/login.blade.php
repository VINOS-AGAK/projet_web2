@extends('layouts.app')

@section('content')
    <div class="container-signup">

        <div class="header-form">
            <h3>Se connecter</h3>
        </div>

        <div class="container-form">

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <p class="text-form">Connectez-vous à votre compte</p>
                <div>

                    <label for="email" class="email">{{ __('Adresse e-mail') }}</label>
                    <input id="email" type="email" placeholder="courriel" class="email @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
    
                    @error('email')
                        <span class="text-form" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>

                    <label for="password" class="password">{{ __('Mot de passe') }}</label>
                    <input id="password" type="password" class="password @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
    
                    @error('password')
                        <span class="text-form" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                {{-- <input type="submit" value="submit" class="submit"> --}}

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Se souvenir de moi') }}
                            </label>
                        </div>
                    </div>
                </div>

                <input type="submit" class="submit" value="Soumettre">

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié?') }}
                    </a>
                @endif

                <p class="text-form">Vous n’avez pas de compte ? Cliquez  <a class="text-login" href="{{ route('register') }}">isi</a> pour vous inscrire.</p>

                {{-- @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif --}}

            </form>
        </div>
    </div>
@endsection

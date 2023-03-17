@extends('layouts.app')

@section('content')
    <div class="container-signup">

        <div class="header-form">
            <h3>Log in</h3>
        </div>

        <div class="container-form">

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <p class="text-form">Log in to your account</p>

                <label for="email" class="email">{{ __('Email Address') }}</label>
                <input id="email" type="email" placeholder="email" class="email @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="text-form" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="password" class="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="password @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                    <span class="text-form" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                {{-- <input type="submit" value="submit" class="submit"> --}}

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <input type="submit" class="submit">

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif

                <p class="text-form">Don't have an account? Click <a class="text-login" href="{{ route('register') }}">here</a> to Sign up.</p>

                {{-- @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif --}}

            </form>
        </div>
    </div>
@endsection

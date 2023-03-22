@extends('layouts.app')

@section('content')

<main class="container-signup">

    <div class="header-form">
        <h3>{{ __('Reset password') }}</h3>
    </div>

    <div class="container-form">

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <p class="text-form">Email addresss:</p>

                <input type="email" class="email" name="email" value="">
        
                @if($errors->has('email'))
                <span class="text-form">
                    validation required
                </span>
                @endif
                
                <button type="submit" class="">
                    {{ __('submit') }}
                </button>
                
        </form>
    </div>
</main>

@endsection

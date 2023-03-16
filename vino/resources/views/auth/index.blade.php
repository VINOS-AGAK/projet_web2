@extends('layouts.app')
@section('title', 'Sign in')
@section('content')

<main class="container-signup">

    <div class="header-form">
        <h3>Welcome</h3>
    </div>

    <div class="container-form">

        <form action="{{route('user.auth')}}" method="post">
            @csrf
            <p class="text-form">Log in to your account</p>

                <input type="email" placeholder="email" class="email" name="email" value="">
        
                @if($errors->has('email'))
                <div class="text-form">
                    {{$errors->first('email')}}
                </div>
                @endif

                <input type="password" placeholder="password" class="password" name="password">

                @if($errors->has('password'))
                <div class="text-form">
                    {{$errors->first('password')}}
                </div>
                @endif

                <input type="submit" value="submit" class="submit">

                <p class="text-form">Forgot your password? Click <a class="text-login" href="{{ route('user.auth')}}">here</a></p>

        </form>
    </div>
</main>

@endsection
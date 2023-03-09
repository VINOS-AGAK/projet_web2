@extends('layouts.app')
@section('title', 'Sign in')
@section('content')

<main class="container-signup">

    <div class="header-form">
        <h3>Welcome</h3>
    </div>

    @if(session('success'))
        <div class="">
            {{session('success')}}
        </div>
    @endif
    <div class="container-form">
        @if(!$errors->isEmpty())
        <div class="" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="" aria-label="Close"></button>
        </div>
        @endif

        <form action="{{route('user.auth')}}" method="post">
            @csrf
            <p class="text-form">Log in to your account</p>
            <div class="">
                <input type="email" placeholder="email" class="email" name="email" value="email">
                @if($errors->has('email'))
                <div class="text-danger mt-2">
                    {{$errors->first('email')}}
                </div>
                @endif

            </div>
            <div class="">
                <input type="password" placeholder="password" class="password" name="password">

                @if($errors->has('password'))
                <div class="">
                    {{$errors->first('password')}}
                </div>
                @endif

            </div>
            <div class="">
                <input type="submit" value="submit" class="submit">
            </div>
            <p class="text-form">Forgot your password? Click <a class="text-login" href="{{ route('user.auth')}}">here</a></p>
        </form>
    </div>
</main>

@endsection
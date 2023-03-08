@extends('layouts.app')
@section('title', 'Sign in')
@section('content')

<main class="">
    <div class="">

        @if(session('success'))
        <div class="">
            {{session('success')}}
        </div>
        @endif

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

            <div class="">
                <input type="email" placeholder="email" class="form-control" name="email" value="email">

                @if($errors->has('email'))
                <div class="text-danger mt-2">
                    {{$errors->first('email')}}
                </div>
                @endif

            </div>
            <div class="">
                <input type="password" placeholder="password" class="form-control" name="password">

                @if($errors->has('password'))
                <div class="">
                    {{$errors->first('password')}}
                </div>
                @endif

            </div>
            <div class="">
                <input type="submit" value="submit" class="">
            </div>
        </form>
        <button><a href="#">Forgot password btn no route yet</a></button>
    </div>
</main>

@endsection
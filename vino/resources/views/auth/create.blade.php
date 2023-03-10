@extends('layouts.app')
@section('title', 'Sign up')
@section('content')

<main class="container-signup">

    <div class="header-form">
        <h3>Sign up</h3>
    </div>

    <div class="container-form">

        <form action="{{ route('user.store')}}" method="post">
            @csrf

            @if(@session('success'))
            <p class="text-form">{{session('success')}}</p>
            @else 
            <p class="text-form">Create an account to create a wine cellar</p>
   

            <!-- {{-- NAME--}} -->
            <div class="">
                <input class="name" type="text" name="name" id="" placeholder="name" value="">
                @if($errors->has('name'))
                <div class="">
                    {{$errors->first('name')}}
                </div>
                @endif
            </div>


            <!-- {{-- EMAIL--}} -->
            <div class="">
                <input class="email" type="email" name="email" id="" placeholder="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                <div class="">
                    {{$errors->first('email')}}
                </div>
                @endif
            </div>


            <!-- {{-- PASSWORD--}} -->
            <div class="">
                <input class="password" type="password" name="password" id="" placeholder="password" value="">
                @if($errors->has('password'))
                <div class="">
                    {{$errors->first('password')}}
                </div>
                @endif
            </div>

            <div class="">
                <input class="submit" type="submit" value="submit">
            </div>
            <p class="text-form">Already have an account? Click <a class="text-login" href="{{ route('user.auth')}}">here</a> to login.</p>
        </form>
        
        @endif
    </div>

</main>



@endsection
@extends('layouts.app')

@section('content')
    <div class="container-signup">

        <div class="header-form">
            <h3>Sign up</h3>
        </div>

        <div class="container-form">

            <form method="POST" action="{{ route('register') }}">
                @csrf

                @if (@session('success'))
                    <p class="text-form">{{ session('success') }}</p>
                @else
                    <p class="text-form">Create an account to create a wine cellar</p>


                    <!-- {{-- NAME --}} -->
                    <div class="">
                        <input class="name @error('name') is-invalid @enderror" type="text" name="name" id=""
                            placeholder="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="text-form" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        {{-- @if ($errors->has('name'))
                            <div class="">
                                {{ $errors->first('name') }}
                            </div>
                        @endif --}}
                    </div>


                    <!-- {{-- EMAIL --}} -->
                    <div class="">
                        <input class="email @error('email') is-invalid @enderror" name="email" type="email"
                            name="email" id="" placeholder="email" value="{{ old('email') }}" required
                            autocomplete="email">

                        @error('email')
                            <span class="text-form" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        {{-- @if ($errors->has('email'))
                            <div class="">
                                {{ $errors->first('email') }}
                            </div>
                        @endif --}}
                    </div>


                    <!-- {{-- PASSWORD --}} -->
                    <div class="">
                        <input class="password  @error('password') is-invalid @enderror" name="password" type="password"
                            name="password" id="" placeholder="password" required autocomplete="new-password">

                        @error('password')
                            <span class="text-form" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        {{-- @if ($errors->has('password'))
                            <div class="">
                                {{ $errors->first('password') }}
                            </div>
                        @endif --}}
                    </div>

                    {{-- PASSWORD CONFIRMATION --}}
                    <div class="">
                        <input class="password" name="password_confirmation" type="password" name="password" id=""
                            placeholder="password" required autocomplete="new-password">
                    </div>

                    {{-- SUBMIT --}}
                    <div class="">
                        <input class="submit" type="submit" value="submit">
                    </div>

                    {{-- have an account --}}
                    <p class="text-form">Already have an account? Click <a class="text-login"
                            href="{{ route('login') }}">here</a> to login.</p>
            </form>
            @endif
        </div>

    </div>

@endsection

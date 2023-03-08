<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>{{ config('app.name')}} : @yield('title')</title>--}}
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layouts.css')}}">

</head>

<body>
    <header>


        <!-- Navbar -->
        <nav class="">

            <div class="c" id="">
                <div class="navbar-nav">
                    <a class="navbar-brand" href="#">Hello @if(Auth::check()) {{Auth::user()->name }} @else Guest @endif</a>
                    @guest
                    <a class="nav-link" href="{{route('user.create')}}">@lang('lang.registration_nav')</a>
                    <a class="nav-link" href="{{route('login')}}">@lang('lang.login_nav')</a>
                    @else
                    {{-- <a class="nav-link" href="{{route('logout')}}">@lang('lang.logout_nav')</a> --}}
                    @endguest
                </div>
            </div>

        </nav>

        <!-- Background image -->
        <div class="">
            <h2>I'm Header image</h2>
        </div>
        <!-- Background image -->

    </header>
</body>

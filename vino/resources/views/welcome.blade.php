@extends('layouts.app')
@section('title', 'Sign up')
@section('content')

<div class="">
    @guest
    <h1>Welcome Guest</h1>
    @else
    <h1>Welcome {{ $name }}</h1>
    @endguest
    <p>Notre page principale de projet Vino-AGAK</p>
</div>

@endsection
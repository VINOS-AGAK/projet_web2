@extends('layouts.app')
@section('title', 'Sign up')
@section('content')

<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 pt-4">
                <div class="card">
                    <h3 class="card-header">
                        Sign up
                    </h3>
                    <div class="col-12 text-center mt-2">
                        <a href="{{ route('welcome') }}" class="btn btn-outline-primary"> Back </a>
                    </div>

                    <div class="card-body">
                        @if(@session('success'))
                         <div class="alert alert-success">
                             session('success')
                         </div>

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Holy guacamole! {{session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <form action="{{ route('user.store')}}" method="post">
                            @csrf

{{--                            NAME--}}
                            <div class="form-group mb-3">
                                <input class="form-control" type="text" name="name" id="" placeholder="name" value="name">
                                @if($errors->has('name'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('name')}}
                                </div>
                                @endif
                            </div>


{{--                            EMAIL--}}
                            <div class="form-group mb-3">
                                <input class="form-control" type="email" name="email" id="" placeholder="email" value="{{ old('email') }}">
                                @if($errors->has('email'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('email')}}
                                </div>
                                @endif
                            </div>


{{--                            PASSWORD--}}
                            <div class="form-group mb-3">
                                <input class="form-control" type="password" name="password" id="" placeholder="password" value="">
                                @if($errors->has('password'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('password')}}
                                </div>
                                @endif
                            </div>

                            <div class="d-grid mx-auto">
                                <input class="btn btn-success" type="submit" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



@endsection

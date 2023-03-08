@extends('layouts.app')
@section('title', 'Sign up')
@section('content')


<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 pt-4">
                <div class="card">
                    <h3 class="card-header">
                        @lang('lang.sign_up')
                    </h3>
                    <div class="col-12 text-center mt-2">

                        <a href="{{ route('etudiant.index') }}" class="btn btn-outline-primary">@lang('lang.back') </a>
                    </div>

                    <div class="card-body">
                        @if(@session('success'))
{{--                         <div class="alert alert-success">--}}
{{--                             session('success') --}}
{{--                         </div>--}}

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Holy guacamole! {{session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <form action="{{ route('user.store')}}" method="post">
                            @csrf

{{--                            NAME--}}
                            <div class="form-group mb-3">
                                <input class="form-control" type="text" name="name" id="" placeholder="@lang('lang.name')" value="{{ old('name') }}">
                                @if($errors->has('name'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('name')}}
                                </div>
                                @endif
                            </div>


{{--                            EMAIL--}}
                            <div class="form-group mb-3">
                                <input class="form-control" type="email" name="email" id="" placeholder="@lang('lang.email')" value="{{ old('email') }}">
                                @if($errors->has('email'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('email')}}
                                </div>
                                @endif
                            </div>


{{--                            PASSWORD--}}
                            <div class="form-group mb-3">
                                <input class="form-control" type="password" name="password" id="" placeholder="@lang('lang.password')" value="">
                                @if($errors->has('password'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('password')}}
                                </div>
                                @endif
                            </div>

{{--                            ADRESS--}}
                            <div class="form-group mb-3">
                                <input class="form-control" type="text" name="adresse" id="" placeholder="@lang('lang.adress')" value="{{ old('name') }}">
                                @if($errors->has('name'))
                                    <div class="text-danger mt-2">
                                        {{$errors->first('name')}}
                                    </div>
                                @endif
                            </div>

{{--                            PHONE--}}
                            <div class="form-group mb-3">
                                <input class="form-control" type="text" name="phone" id="" placeholder="@lang('lang.phone')" value="{{ old('name') }}">
                                @if($errors->has('name'))
                                    <div class="text-danger mt-2">
                                        {{$errors->first('name')}}
                                    </div>
                                @endif
                            </div>

{{--                            BIRTHDAY--}}
                            <div class="form-group mb-3">
                                <input class="form-control" type="date" name="birthday" id="" placeholder="@lang('lang.birthday')" value="{{ old('name') }}">
                                @if($errors->has('name'))
                                    <div class="text-danger mt-2">
                                        {{$errors->first('name')}}
                                    </div>
                                @endif
                            </div>

{{--                            CITY--}}
                            <select name="user_ville_id" id="" class="control-group col-12">
                                @foreach ($villes as $ville)
                                    <option value="{{$ville->id}}">{{$ville->name}}</option>
                                @endforeach
                            </select>

                            {{--                            ETUDIANTE?--}}
                            <div  class="form-check">
                                <label class="form-check-label" for="flexCheckChecked" > @lang('lang.student_q') / @lang('lang.info_login_students')
                                    <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="user_etudiant_id">
                                </label>
                            </div>


                            <div class="d-grid mx-auto">
                                <input class="btn btn-success" type="submit" value=" @lang('lang.submit') ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



@endsection

{{-- @extends('layouts.app') --}}
@section('title', 'Enregistrer')
{{-- @section('content') --}}
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 pt-4">
                <div class="card">
                    <div class="card-body">

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                        @endif

                        @if(!$errors->isEmpty())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <form action="{{route('user.auth')}}" method="post">
                            @csrf

                            <div class="form-group mb-3">
                                <input type="email" placeholder="@lang('lang.email')" class="form-control" name="email" value="{{old('email')}}">
                                @if($errors->has('email'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('email')}}
                                </div>

                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="@lang('lang.password')" class="form-control" name="password">
                                @if($errors->has('password'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('password')}}
                                </div>

                                @endif

                            </div>
                            <div class="d-grid mx-auto">
                                <input type="submit" placeholder="Sauvgarder" value="@lang('lang.submit')" class="btn btn-warning btn-block">
                            </div>
                        </form>
                            {{-- <a href="{{route('forgot.pass')}}">Mot de passe oublié</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

{{-- @endsection --}}

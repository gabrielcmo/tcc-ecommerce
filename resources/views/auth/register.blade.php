@extends('layouts.layout')

@section('stylesheets')
    <style>

    </style>
@endsection

@section('content')
<div class="container pt-2">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf
                        <div class="form-group row mb-0">
                            <img src="{{asset('img/logo_inteiro.png')}}" class="mx-auto d-block" alt="" height="250">
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-lg-3 col-form-label text-md-right">{{ __('Nome') }}</label>
                            <div class="col-md-9 col-lg-8">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-lg-3 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-9 col-lg-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-lg-3 col-form-label text-md-right">{{ __('Senha') }}</label>
                            <div class="col-md-9 col-lg-8">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-2 col-lg-3 col-form-label text-md-right">{{ __('Confirmar senha') }}</label>
                            <div class="col-md-9 col-lg-8">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-6 offset-md-2 offset-lg-3">
                                {!! NoCaptcha::display() !!}        
                            </div>                   
                        </div>
                        <div class="row mx-auto col-md-12 col-lg-6 mb-3">
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 col-lg-12 offset-md-2 offset-lg-3">
                                <button type="submit" class="mdc-button mdc-button--raised" style="background-color:#76323f">
                                    <span class="mdc-button__label">Registrar</span>
                                </button>
                                <button class="mdc-button mdc-button--raised actionButton" data-href="{{ url('/auth/google') }}" style="background-color:#76323f">
                                    <i class="fab fa-google mr-1"></i>
                                    <span class="mdc-button__label">Google</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {!! NoCaptcha::renderJs() !!}
    <script src="{{asset('js/customJs/auth.js')}}"></script>
@endsection
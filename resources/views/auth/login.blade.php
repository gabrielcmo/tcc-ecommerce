@extends('layouts.new_layout')

@section('stylesheets')
    <style>

    </style>
@endsection

@section('content')
<div class="container pt-2">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row mb-0">
                            <img src="{{asset('img/logo_inteiro.png')}}" alt="Logo Doomus" class="mx-auto d-block" height="250">
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-lg-3 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-9 col-lg-7">
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
                            <div class="col-md-9 col-lg-7">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 col-lg-12 offset-lg-4 offset-md-0">
                                <button type="submit" class="mdc-button mdc-button--raised">
                                  <span class="mdc-button__label">Logar</span>
                                </button>
                                <button class="mdc-button mdc-button--raised actionButton" data-href="{{ url('/auth/google') }}">
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
@endsection
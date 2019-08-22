<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/config.css')}}">
</head>
<body>
    <div class="container-fluid">
            <div class="row justify-content-center mt-5">
                    <div class="col-lg-8">
                            <section class="login-header">
                                <img src="{{asset('img/capa_13.jpg')}}" class="login-doomus-logo" alt="doomus-logo">
                                    <h1 style="font-family: 'Roboto';">DOOMUS</h1>
                                  </section>
                                
                                  <form action="{{route('login')}}" method="POST">
                                    @csrf
                                    <div class="mdc-text-field login-email">
                                      <input type="text" class="mdc-text-field__input" id="email-input" name="email" required>
                                      <label class="mdc-floating-label" for="email-input">Email</label>
                                      <div class="mdc-line-ripple"></div>
                                    </div>
                                    <div class="mdc-text-field login-password">
                                      <input type="password" class="mdc-text-field__input" id="password-input" name="password" required minlength="6">
                                      <label class="mdc-floating-label" for="password-input">Senha</label>
                                      <div class="mdc-line-ripple"></div>
                                    </div>
                                    <div class="login-button-container">
                                        <a type="button" class="mdc-button cancel" href="{{ URL::previous() }}">
                                            <span class="mdc-button__label">
                                            Voltar
                                            </span>
                                        </a>
                                      <button class="mdc-button mdc-button--raised next" type="submit">
                                        <span class="mdc-button__label">
                                          Logar
                                        </span>
                                      </button>
                                    </div>
                                  </form>
                    </div>
                </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/configLogin.js')}}"></script>
</body>
</html>
    



{{-- @extends('layouts.default')

@section('title', 'Login')

@section('stylesheets')
    <style>
        .footer{
            position: fixed;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Lembrar de mim') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                    <a href="{{ url('api/auth/google') }}" class="btn btn-primary"><i class="fab fa-google"></i>&nbsp;&nbsp;Google</a>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Esqueceu sua senha?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

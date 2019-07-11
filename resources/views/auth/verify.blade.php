@extends('layouts.default')

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
                <div class="card-header">{{ __('Verifique seu endereço de email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Depois de enviado, por favor cheque seu email para acessar o link de verificação') }}
                    {{ __('Se você não recebeu o email') }}, <a href="{{ route('verification.resend') }}">{{ __('clique aqui para enviar novamente') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

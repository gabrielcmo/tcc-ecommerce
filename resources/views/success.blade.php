@extends('layouts.layout')

@section('stylesheets')
    <style>
        .footer{
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="progress">
          <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
        </div>
                  
        <h4 class="mx-auto text-center bg-light m-5">Seu pagamento foi realizado e está sendo processado. Acompanhe <a href="{{route('orders')}}">clicando aqui</a></h4>
        <p class="mx-auto text-center bg-light m-5">
            Você será redirecionado para a página inicial em 5 segundos. 
            <button class="mdc-button mdc-button--raised general-button">
                <span class="mdc-button__label">Clique aqui para voltar agora</span>
            </button>
        </p>
    </div>

    <meta http-equiv="refresh" content="5; url=http://localhost:8000/" />

    <div style="height:200px"></div>
@endsection
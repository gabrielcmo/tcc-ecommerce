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
                  
        <h4 class="mx-auto text-center m-5">Seu pagamento foi realizado e está sendo processado. Acompanhe acessando: <a href="{{route('orders')}}">Meus Pedidos</a></h4>
    </div>

    <div style="height:200px"></div>
@endsection
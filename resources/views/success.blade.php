@extends('layouts.new_layout')

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
                  
        <h1 class="mx-auto text-center bg-light m-5"><strong class="">Obrigado por comprar na nossa loja!</strong></h1>
    </div>

    <meta http-equiv="refresh" content="2; url=http://localhost:8000/" />
@endsection
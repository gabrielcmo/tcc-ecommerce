@extends('layouts.admin')

@section('title')
    Painel inicial
@endsection

@section('content')
    <h2>Bem-vindo ao painel de controle, {{ Auth::user()->name }}</h2>
    <br>

    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-primary" href="/admin/orders?date=today&orderby=id">
                Pedidos hoje &nbsp;<span class="badge badge-light">4</span>
            </a>
        </div>
    </div>
@endsection
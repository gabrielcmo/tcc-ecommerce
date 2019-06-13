@extends('layouts.admin')

@section('title')
    Painel inicial
@endsection

@section('content')
    <h2>Bem-vindo ao painel de controle, {{ Auth::user()->name }}</h2>
    <br><br>

    <div class="row">
        <div class="col-md-6">
            <h4>Relatório</h4>
        </div>
        <div class="col-md-6">
            <a class="btn btn-primary" href="/admin/orders?date=today&orderby=id">
                Pedidos hoje &nbsp;<span class="badge badge-light">4</span>
            </a><br><br>
            <a class="btn btn-primary" href="/admin/support?date=today&orderby=id">
                Mensagens hoje &nbsp;<span class="badge badge-light">20</span><br>
            </a><br>
        </div>
    </div>
@endsection
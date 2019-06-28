@extends('layouts.admin')

@section('title')
    Painel inicial
@endsection

@section('content')
    <h2>Bem-vindo ao painel de controle, {{ Auth::user()->name }}</h2>
    <br><br>

    <div class="row">
        <div class="col-md-6">
        </div>
    </div>
@endsection
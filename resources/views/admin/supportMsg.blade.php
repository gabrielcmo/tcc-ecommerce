@extends('layouts.admin')

@section('title', 'Suporte')

@section('content')
    <h3>Mensagem Suporte ID {{$support->id}}</h3>
    <br>
    <div class="row">
        <div class="col-md-12 text-left">
            <h5>Enviado por</h5> {{$support->subject}}
        </div><br><br><br>
        <div class="col-md-12 text-left">
            <h5>Mensagem</h5> {{$support->message}}
        </div>
    </div>
@endsection
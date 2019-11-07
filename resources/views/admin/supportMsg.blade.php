@extends('layouts.admin')

@section('title', 'Suporte')

@section('content')
    <h3>Mensagem ID {{$support->id}}</h3>
    <br>
    <div class="row">
        <form action="{{ route(supportResponderMsg) }}" method="post"></form>
            <div class="form-group col-12">
                <label for="subject">Assunto</label>
                <input type="text" name="subject" class="form-control" id="subject">
            </div>
            <div class="form-group col-12">
                <label for="message">Mensagem</label>
                <textarea type="text" name="message" class="form-control" id="message"></textarea>
            </div>
            <input type="hidden" name="support_id" id="">
            <div class="form-group col-12">
                <input type="submit" value="Responder" class="btn btn-success float-right">
            </div>
    </div>
@endsection
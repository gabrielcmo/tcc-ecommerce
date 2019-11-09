@extends('layouts.admin')

@section('title', 'Suporte')

@section('content')
    <h3>Mensagem ID {{$support->id}}</h3>
    <br>
    <div class="row">
        <form action="{{ route('supportResponderMsg') }}" method="post" class="w-100">
            <div class="form-group col-12">
                <label for="response">Resposta</label>
                <textarea type="text" name="response" class="form-control" id="response" rows="4"></textarea>
            </div>
            <div class="form-group col-12">
                <input type="submit" value="Responder" class="btn btn-success float-right">
            </div>
        </form>
    </div>
@endsection
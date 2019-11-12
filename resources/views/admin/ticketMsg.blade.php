@extends('layouts.admin')

@section('title', "Responder Ticket $ticket->id")

@section('content')
    <h3>Mensagem ID {{$ticket->id}}</h3>
    <br>
    <div class="row">
    <form action="{{ route('admin.ticket.update') }}" method="post" class="w-100">

        @csrf

        <p class="font-weight-bolder">Assunto: <span class="font-weight-light">{{$ticket->subject}}</span></p>
        <p class="font-weight-bolder">Tipo da dúvida: <span class="font-weight-light">{{$ticket->ticket_type->name}}</span></p>
        <p class="font-weight-bolder">Mensagem: <span class="font-weight-light">{{$ticket->message}}</span></p>
            <div class="form-group col-12">
                <label for="response">Resposta</label>
                <textarea type="text" name="response_message" class="form-control" id="response" rows="4"></textarea>
            </div>

            <input type="hidden" name="ticket_id" value="{{$ticket->id}}">

            <div class="form-group col-12">
                <input type="submit" value="Responder" class="btn btn-success float-right">
            </div>
        </form>
    </div>
@endsection
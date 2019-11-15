@extends('layouts.admin')

@section('title', "Responder Ticket $ticket->id")

@section('content')
    <div class="card text-left">
      <div class="card-body">
        <h4 class="card-title">Mensagem ID {{ $ticket->id}}</h4>
        <p class="card-text">
            <form action="{{ route('admin.ticket.update') }}" method="post" class="w-100">
                <div class="row">
                    @csrf
                    <p class="font-weight-bolder col-12">Assunto: <span class="font-weight-light">{{$ticket->subject}}</span></p>
                    <p class="font-weight-bolder col-12">Tipo da dúvida: <span class="font-weight-light">{{$ticket->ticket_type->name}}</span></p>
                    <p class="font-weight-bolder col-12">Mensagem: <span class="font-weight-light">{{$ticket->message}}</span></p>
                    <div class="form-group col-12">
                        <label for="response">Resposta</label>
                        <textarea type="text" name="response_message" class="form-control" id="response" rows="4"></textarea>
                    </div>
                    <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                </div>
                <input type="submit" value="Responder" class="btn btn-success float-right">
            </form>
        </p>
      </div>
    </div>
@endsection
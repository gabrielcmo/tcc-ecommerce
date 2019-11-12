@extends('layouts.layout')

@section('title', 'Criar ticket de suporte')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12 col-lg-8">
      <div class="card">
        <div class="card-header">Criar ticket de suporte</div>
        <div class="card-body">
          <form action="{{route('ticket.store')}}" method="POST">
            @csrf

            <div class="form-group">
              <label for="subjectInput">Assunto</label>
              <input type="text" class="form-control" id="subjectInput" name="ticket_subject" placeholder="Assunto">
            </div>
            <div class="form-group">
              <label for="typeInput">Tipo do problema</label>
              <select class="custom-select" name="ticket_type" id="typeInput">
                <option selected>Tipo da dúvida</option>
                <option value="1">Problemas com algum pedido</option>
                <option value="2">Problemas técnicos</option>
                <option value="3">Problemas ao confirmar a compra</option>
              </select>
            </div>
            <div class="form-group">
              <label for="messageInput">Mensagem</label>
              <textarea type="text" class="form-control" id="messageInput" name="ticket_message" placeholder="Mensagem" rows="4"></textarea>
            </div>
            <button class="mdc-button mdc-button--raised general-button" type="submit">
              <span class="mdc-button__label">Criar ticket</span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
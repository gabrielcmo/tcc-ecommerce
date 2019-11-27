@extends('layouts.layout')

@section('title', 'Meus tickets')

@section('content')
<div class="container">
    @if(count($tickets) == 0)
        <div class="row justify-content-center">
            <div class="card p-2 bg-light">
                <h5 class="text-center">Você não possui nenhum ticket de suporte!</h5>
                <h6 class="text-center">Para criar um ticket de suporte clique no botão abaixo!</h6>
                <button class="mdc-button mdc-button--raised general-button actionButton" data-href="{{route('ticket.create')}}">
                    <span class="mdc-button__label">Criar ticket</span>
                </button>
            </div>
        </div>
    @else
        <div class="row mt-3">
            <h4 class="ml-2">Tickets
            <button class="mdc-button mdc-button--raised general-button actionButton" data-href="{{route('ticket.create')}}">
                    <span class="mdc-button__label">Abrir novo ticket</span>
                </button>
            </h4>
        </div>
        <div class="row mt-2">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Tickets</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td class="ticket{{$loop->iteration}}-accordion">
                                <div class="w-100 tickets-accordions" id="ticket{{$loop->iteration}}-accordion" data-ticket="{{$loop->iteration}}">
                                    <div class="card">
                                        <div class="card-header tickets-accordions-header" id="ticket{{$loop->iteration}}-accordion-header">
                                            <h5 class="d-flex justify-content-between align-items-center mb-0">
                                                <span class="">Número do ticket: <span class="text-weight-bolder">{{$ticket->id}}</span></span>
                                                <span class="text-right">Status:
                                                    @if ($ticket->status == 0)
                                                        <span class="text-warning">Em análise</span>
                                                    @else
                                                        <span class="text-success">Respondido</span>
                                                    @endif
                                                </span>
                                            </h5>
                                        </div>
                                        <div id="ticket{{$loop->iteration}}-accordion-collapse" class="collapse" aria-labelledy="ticket{{$loop->iteration}}-accordion-header" data-parent="#ticket{{$loop->iteration}}-accordion">
                                            <div class="card-body">
                                                <div>
                                                    <h4 class="d-flex justify-content-between" id="ticket-data-header">
                                                        <span>Ticket de número: {{$ticket->id}}</span>
                                                        <span>Criado no dia:
                                                            <span class="font-weight-normal">
                                                                @php
                                                                    $creation_date_formatted = DateTime::createFromFormat('Y-m-d H:i:s', $ticket->creation_date);
                                                                    echo $creation_date_formatted->format('d/m/Y H:i:s');
                                                                @endphp
                                                            </span>
                                                        </span>
                                                    </h4>
                                                    <h5 class="mt-2">Dados do ticket</h5>
                                                    <p class="font-weight-bolder mb-1">Assunto: <span class="font-weight-normal">{{$ticket->subject}}</span></p>
                                                    <p class="font-weight-bolder mb-1">Tipo da dúvida: <span class="font-weight-normal">{{$ticket->ticket_type->name}}</span></p>
                                                    <p class="font-weight-bolder mb-1">Mensagem: <span class="text-justify text-break font-weight-normal">{{$ticket->message}}</span></p>
                                                    @if ($ticket->status == 1)
                                                        <p class="font-weight-bolder mb-1">Resposta 
                                                            @php
                                                                $response_date_formatted = DateTime::createFromFormat('Y-m-d H:i:s', $ticket->response_date);
                                                                echo '(' . $response_date_formatted->format('d/m/Y H:i:s') . ') :';
                                                            @endphp
                                                            <span class="text-justify text-break font-weight-normal">{{$ticket->response}}</span>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script src="{{asset('js/customJs/ticket.js')}}"></script>
@endsection
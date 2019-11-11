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
            <h4 class="ml-2">Tickets</h4>
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
                                                    @switch($ticket->status)
                                                        @case(1)
                                                            
                                                            @break
                                                        @case(2)
                                                            
                                                            @break
                                                        @default
                                                            
                                                    @endswitch
                                                </span>
                                            </h5>
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
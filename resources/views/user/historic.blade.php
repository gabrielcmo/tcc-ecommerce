@extends('layouts.default')

@section('title', 'Historico')

@section('content')
    @if (count($historic) == 0)
        <h1>Seu histórico está vazio!</h1>
    @else
        @foreach ($historic as $item)
            ID: {{$item->id}} <br>
            PRODUTO: {{$item->product->name}} <br>
            QTD: {{$item->qty}} <br>
            STATUS: {{$item->status->name}} <br><br><br>
        @endforeach
    @endif
@endsection
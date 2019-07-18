@extends('layouts.default')

@section('title', 'Pedidos')

@section('content')
    @if (count($orders) == 0)
        <h3>Você ainda não tem nenhum pedido em andamento!</h3>
    @else
        @foreach ($orders as $item)
            ID: {{$item->id}} <br>
            PRODUTO: {{$item->product->name}} <br>
            QTD: {{$item->qty}} <br>
            MÉTODO DE PAG: {{$item->payment_method->name}} <br><br>
        @endforeach
    @endif
@endsection
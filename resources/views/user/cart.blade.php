@extends('layouts.default')

@section('title', 'Carrinho')

@section('content')
    <div class="container">
        <a href="/carrinho/delete">Limpar carrinho</a>

        <br><br>

        @foreach($cart as $item)
            {{ $item->name }} <br>
            {{ $item->qty }} <br>
            {{ $item->price }} <br><br>
        @endforeach

        Subtotal: R${{ Cart::subtotal() }} <br>
        Valor total: R${{ Cart::total() }} <br><br>

        <a class="btn btn-success" href="/checkout">Fazer pedido</a>
    </div>
@endsection
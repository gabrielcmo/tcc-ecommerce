@extends('layouts.default')

@section('title', 'Carrinho')

@section('content')

    <a href="/carrinho/delete">Limpar carrinho</a>

    <br><br>

    @foreach($cart as $item)
        {{ $item->name }} <br>
        {{ $item->qty }} <br>
        {{ $item->price }} <br><br>
    @endforeach

    {{ debug($cart) }}
@endsection

@section('scripts')
@endsection
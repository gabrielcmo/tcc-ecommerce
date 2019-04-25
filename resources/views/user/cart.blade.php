@extends('layouts.app')

@section('title', 'Carrinho')

@section('stylesheets')
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet"/>
@endsection

@section('other-contents')

@endsection

@section('content')
    <a href="{{ route('cart.clear') }}">Limpar carrinho</a> <br/>

    @foreach(Cart::content() as $row)
        {{ "Você possui $row->qty de quantidade do produto $row->name, de valor $row->price" }} <br/>
    @endforeach

    {{ debug(Cart::content())  }}
@endsection
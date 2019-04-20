@extends('layouts.app')

@section('title', 'Carrinho')

@section('stylesheets')
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet"/>
@endsection

@section('other-contents')
    <a href="{{ route('cart.clear') }}">Limpar carrinho</a> <br/>
@endsection

@section('content')

    {{ debug($cart)  }}

@endsection
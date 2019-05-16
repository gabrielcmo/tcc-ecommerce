@extends('layouts.default')

@section('title', 'Carrinho')

@section('content')
    {{ debug(Cart::content())  }}
@endsection

@section('scripts')
 //
@endsection
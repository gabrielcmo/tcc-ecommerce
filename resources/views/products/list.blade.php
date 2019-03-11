@extends('layouts.app')

@section('content')
    <h1>Produtos</h1>
    @if ( $products !== null )
        @foreach ( $products as $product )
            {{$product->name}}
        @endforeach
    @endif
@endsection
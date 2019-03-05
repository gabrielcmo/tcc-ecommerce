@extends('layouts.app')

@section('content')
    @if ( $products !== null )
        @foreach ( $products as $product )
            {{$product->name}}
        @endforeach
    @endif
@endsection
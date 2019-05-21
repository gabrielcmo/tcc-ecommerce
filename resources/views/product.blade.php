@extends('layouts.default')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
    {{ debug($product) }}
@endsection
@extends('layouts.index')

@section('content')
    <h2 class="poppins">index page test</h2><br><br>
@endsection

@section('categories')
    <h3 class="poppins">Categories</h3>
    @foreach ($categories as $category)
        {{ $category->name }} <br>
    @endforeach
@endsection

@section('products')
    <h3 class="poppins">Products</h3>
    @foreach ($products as $product)
        Nome: {{ $product->name }} <br>
        Descriçãp: {{ $product->description }} <br>
        Valor: {{ $product->value }} <br>
        Quantidade em estoque: {{ $product->qtd_in_stock }} <br><br><br>
    @endforeach
@endsection
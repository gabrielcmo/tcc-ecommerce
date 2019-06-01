@extends('layouts.default')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
  <section class="container">
    <div class="row">
      <section class="col-12 d-none d-md-block">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/" class="trsn" title="Go back to Home">Home</a></li>
          <li class="breadcrumb-item"><span>{{ $product->name }}</span></li>
        </ol>
      </section>
    </div>
  </section>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="page-header">{{ $product->name }}</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 mb-4">
        <div class="">
          @foreach($product->image as $image)
            <div class="main-product-image">
              <img src="/img/products/{{$image->filename}}" alt="DualShock Controller for PlayStation 4" class="img-fluid">
            </div>
          @endforeach
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group price_elem row">
          <label class="col-sm-3 col-md-3 form-control-label nopaddingtop">Preço:</label>
          <div class="col-sm-8 col-md-9">
            <span class="product-form-price" id="product-form-price">R$ {{ $product->price }}</span>
          </div>
        </div>
        <div class="form-group row">
          <label for="Quantity" class="col-sm-3 col-md-3 form-control-label">Quantidade:</label>
          <div class="col-sm-8 col-md-9">
            <input type="number" class="qty form-control" ng-name="qty" id="input-qty" name="qty" min='1' maxlength="3" value="1" >
          </div>
        </div>
        <div class="form-group product-stock product-out-stock row hidden">
          <div class="col-sm-8 col-md-9 mx-auto">
            @if($product->qtd_last == 0)
              <span class="bg-danger btn product-form-price">Esgotado</span>
              <p>Infelizmente este produto está esgotado. Contate-nos para solitar um para você.</p>
              <a href="/contact" class="btn btn-secondary btn-sm" title="Contact Us">Contate-nos</a>
              <a href="javascript:history.back()" class="btn btn-link btn-sm" title="&larr; Ou continue comprando">&larr; Ou continue comprando</a>
            @elseif($product->qtd_last < 5)
              <span class="bg-danger btn product-form-price">Restam apenas {{ $product->qtd_last }}</span>
            @else
              <span class="bg-success btn product-form-price">Disponível</span>
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-md-3 form-control-label">Descrição:</label>
          <div class="col-sm-8 col-md-9 description">
            <p>{{ $product->description }}</p>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-md-3 form-control-label">Detalhes:</label>
          <div class="col-sm-9 col-md-9">
            <p>{{ $product->details }}</p>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-9 col-md-9">
            <a href="/carrinho/{{$product->id}}/add" class="btn btn-dark">Adicionar ao carrinho</a>  
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@extends('layouts.default')

@section('title', 'Home')

@section('styles')
  <link href="{{ asset('/css/styleHome.min.css') }}" rel="stylesheet"/>
@endsection

@section('content')
<<<<<<< HEAD
      @foreach($products as $product)
        <div class="row">
            <div class="card" style="width: 18rem;">
              @foreach($product->image as $image)
                <div class="main-product-image">
                  <img src="/img/products/{{$image->filename}}" alt="DualShock Controller for PlayStation 4" class="img-fluid">
                </div>
              @endforeach
              <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Preço: R${{ $product->price }}</li>
                <li class="list-group-item">Categoria: {{ $product->category->name }}</li>
                <li class="list-group-item">Detalhes: {{ $product->details }}</li>
                <li class="list-group-item">Descrição: {{ $product->description }}</li>
              </ul>
              <div class="card-body">
                <a class="card-link" href="/carrinho/{{ $product->id }}/add">Adicionar ao carrinho</a><br>
              </div>
            </div>
            </div>
=======
  <div class="container">
  <div class="row">
      @foreach($products as $product)
        <?php $images = $product->image; ?>
        <div class="col-md-4">
          <div class="card">
            @foreach($product->image as $image)
              @if(isset($image) && $image !== null && $image->filename !== null || $image->filename !== '')
                <div class="card-image">
                  <img src="/img/products/{{$image->filename}}" alt="Produto" class="img-fluid">
                </div>
              @elseif(!isset($image))  
                <div class="card-image">
                  <img src="/img/doomus.png" alt="Produto" class="img-fluid">
                </div>
              @endif
            @endforeach
            <h3 class="card-title">{{ $product->name }}</h3>
            @for ($i = 0; $i < $product->ratingPercent(100); $i++)
                <i class="material-icons">star</i>
            @endfor
            <a class="btn btn-success" href="/carrinho/{{ $product->id }}/add">Adicionar ao carrinho</a><br>      
          </div>
>>>>>>> 5352919788ca5884c0c40442cdac39e0c419b023
        </div>
      @endforeach
    </div>
  </div>
@endsection
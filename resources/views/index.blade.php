@extends('layouts.default')

@section('title', 'Home')

@section('stylesheets')
  <link rel="stylesheet" href="css/styleHome.css">
@endsection

@section('other-contents')
  <!-- Page Content -->
    
  <section class="container">
      <div class="row">
        <section class="col-12 d-none d-md-block">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="trsn" title="Go back to Home">Home</a></li>
          </ol>
        </section>
      </div>

    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselIndicators" data-slide-to="1"></li>
        <li data-target="#carouselIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="http://lojasnazari.com.br/img/site/431/t/570051.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="http://lojasnazari.com.br/img/site/431/t/570038.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="http://lojasnazari.com.br/img/site/431/t/570047.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </div>
  </section>
@endsection

@section('content')
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
        </div>
      @endforeach
    <br>
    <div class="jumbotron jumbotron-fluid">
        <h1 class="display-4">Fluid jumbotron</h1>
        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
      </div>
    </div>
@endsection

@section('scripts')

@endsection
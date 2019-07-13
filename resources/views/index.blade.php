@extends('layouts.default')

@section('title', 'Home')

@section('stylesheets')
  <link href="{{ asset('/css/styleHome.min.css') }}" rel="stylesheet"/>
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
  <div class="container"><br>
    <div class="row">
      @foreach($products as $product)
        <?php $images = $product->image; ?>
        <div class="col-md-4">
          <div class="card view overlay zoom">
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
            <div class="mask flex-center">
              <a class="btn btn-success" href="/carrinho/{{ $product->id }}/add">Adicionar ao carrinho</a><br>      
            </div>
            <h3 class="card-title">{{ $product->name }}</h3>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
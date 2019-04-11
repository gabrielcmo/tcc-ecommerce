@extends('layouts.index')

@section('content')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img class="d-block w-100" src="{{ asset('images/carousel-1.jpg') }}" alt="Carrosel de imagens">
        <div class="carousel-caption d-none d-md-block">
            <h5 style="color: black;font-size: 2em;">O melhor para sua casa é aqui</h5>
            <p style="color: black;font-size: 1.5em;">Oferecemos os mais variados produtos para deixar seu lar muito mais aconchegante!</p>
        </div>
    </div>
    <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('images/carousel-2.jpg') }}" alt="Carrosel de imagens">
        <div class="carousel-caption d-none d-md-block">
            <h5 style="color: black;font-size: 2em;">Produtos para sua cozinha</h5>
            <p style="color: black;font-size: 1.5em;">Os mais variados produtos para preparar sua comida</p>
        </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Próximo</span>
  </a>
</div><br>
@endsection

@section('categories')
    <h3 class="poppins">Categorias</h3>
    <div class="card">
      @foreach ($categories as $category)
          <a href="/produtos/{{$category->id}}">{{ $category->name }}</a>
      @endforeach
    </div>
@endsection

@section('products')
    <h3 class="poppins">Produtos</h3>
    <div class="row">
      @foreach ($products as $product)
      <div class="card">
        <div class="card-hover">
          <div class="card-text py-5 text-center">
            <h5>{{$product->name}}</h5>
            {{$product->description}} <br>
            {{$product->value}} reais <br>
            <span>Em estoque: <em>{{$product->qtd_in_stock}}</em></span>
          </div>
        </div>
        <div class="card-image">
            <img src="images/{{$product->image}}" />
        </div>
      </div>
      @endforeach
    </div>
@endsection
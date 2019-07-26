@extends('layouts.default')

@section('title', 'Home')

@section('styles')
  <link href="{{ asset('/css/styleHome.min.css') }}" rel="stylesheet"/>
@endsection

@section('content')
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
            <a class="btn btn-success" href="/carrinho/{{ $product->id }}/add">Adicionar ao carrinho</a><br>      
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
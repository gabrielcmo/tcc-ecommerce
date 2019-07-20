@extends('layouts.default')

@section('title', 'Home')

@section('stylesheets')
  <link href="{{ asset('/css/styleHome.min.css') }}" rel="stylesheet"/>
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/css/uikit.min.css" />

  <!-- UIkit JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit-icons.min.js"></script>
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
    <a class="uk-button uk-button-default" href="#modal-sections" uk-toggle>Open</a>

<div id="modal-sections" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Carrinho</h2>
        </div>
        <div class="uk-modal-body">
          <div class="container">
            @if(Cart::count() == 0)
                <h2>Seu carrinho está vazio!</h2>
            @else
            <a class="btn btn-danger" href="/carrinho/delete">Limpar carrinho</a><br><br>
            <div class="row">
                <div class="col-md-9">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Valor unitário</th>
                                <th scope="col">Valor total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->price*$item->qty }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                <a class="btn btn-success" href="/checkout/endereco" onclick="displaySpinner();">
                    <span style="display:none;" id="spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Fazer pedido
                </a>
                </div>
                <div class="col-md-3">
                    <table class="table">
                        <thead class="thead-dark ">
                            <tr>
                                <th colspan="2" class="text-center">Pedido</th>
                            </tr>
                            <tr>
                                <th>Subtotal</th>
                                <td>{{ Cart::subtotal() }}</td>
                            </tr>
                            <tr>
                                <th>Taxa</th>
                                <td>{{ Cart::tax() }}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>{{ Cart::total() }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            @endif
        </div>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="button">Save</button>
        </div>
    </div>
</div>
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
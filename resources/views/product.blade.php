@extends('layouts.new_layout')

@section('stylesheets')
  <link href="{{ asset('/css/styleHome.css') }}" rel="stylesheet"/>
@endsection

@section('title', $product->name)

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
        <h2 class="page-header">{{ $product->name }}</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 mb-4">
        <div class="">
          <!--Carousel Wrapper-->
          <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
            <!--Indicators-->
            <ol class="carousel-indicators">
              @for ($i = 0; $i < count($product->image); $i++)
                @if($i == 0)
                  <li data-target="#carousel-example-1z" data-slide-to="{{$i}}" class="active"></li>
                @else
                  <li data-target="#carousel-example-1z" data-slide-to="{{$i}}"></li>
                @endif
              @endfor
            </ol>
            <!--/.Indicators-->
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
              @for($i = 0; $i < count($product->image); $i++)
                <div class="carousel-item active">
                  <img class="d-block w-100" src="{{asset("/img/products/".$product->image[$i]->filename)}}"
                    alt="Slide product">
                </div>
              @endfor
            <!--/.Slides-->
            </div>  
            <!--Controls-->
            <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            <!--/.Controls-->
          </div>
          <!--/.Carousel Wrapper-->
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
          <label class="col-sm-3 col-md-3 form-control-label nopaddingtop">Avalie o produto:</label>
          <div class="col-sm-8 col-md-9">
            <form name="avaliateForm" action="{{ route('avaliate') }}" method="post">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" required/>
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" required/>
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" required/>
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" required/>
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" required/>
                <label for="star1" title="text">1 star</label>
              </div>({{ $product->ratingPercent(100) }})
              <button class="btn btn-primary btn-sm" type="submit">Avaliar</button>
            </form>
          </div>
        </div>
        <form name="addToCart" action="{{ route('cart.add') }}" method="get">
        <div class="form-group row">
          <label for="Quantity" class="col-sm-3 col-md-3 form-control-label">Quantidade:</label>
          <div class="col-sm-8 col-md-9">
            <input type="number" class="form-control{{ $errors->has('qty') ? ' is-invalid' : '' }}" name="qty" min='1' max="100" value="1" >
          </div>
          @if ($errors->has('qty'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('qty') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group product-stock product-out-stock row hidden">
          <div class="col-sm-8 col-md-9 mx-auto">
            @if($product->qtd_last == 0)
              <span class="bg-danger btn product-form-price">Esgotado</span>
              <p>Infelizmente este produto está esgotado. Contate-nos para solitar um para você.</p>
              <a href="#" class="btn btn-secondary btn-sm" title="Contact Us">Contate-nos</a>
              <a href="javascript:history.back()" class="btn btn-link btn-sm" title="&larr; Ou continue comprando">&larr; Ou continue comprando</a>
            @elseif($product->qtd_last <= 25)
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
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <div class="form-group row">
          <div class="col-sm-9 col-md-9">
            <button type="button" onclick="document.addToCart.submit();" class="btn btn-dark">Adicionar ao carrinho</button>  
          </div>
        </div>
      </div>
      </form>
      <br><br>
      <div class="col-md-12">
        <h2>Outros produtos</h2><br>
      </div>

      <?php $i = 0; ?>
      @foreach(Doomus\Product::all() as $product)
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
        <?php 
          $i++;
          if($i == 3){
            break;
          }
        ?>
      @endforeach
    </div>
  </div>
@endsection

@section('scripts')

@endsection
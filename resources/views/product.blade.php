@extends('layouts.new_layout')

@section('stylesheets')
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet"/>
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
              <?php $count = 0 ?>
              @foreach($product->image as $image)
                @if ($count == 0)
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset("/img/products/".$image->filename)}}">
                  </div>
                @else
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset("/img/products/".$image->filename)}}">
                  </div>
                @endif
                <?php $count++; ?>
              @endforeach
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
        <h3 class="page-header row col-sm-12 col-md-12">{{ $product->name }} &nbsp;
          @if($product->qtd_last == 0)
            <span class="bg-danger btn product-form-price">Esgotado</span>
            <p>Infelizmente este produto está esgotado. Contate-nos para solitar um para você.</p>
            <a href="#" class="btn btn-secondary btn-sm" title="Contact Us">Contate-nos</a>
            <a href="javascript:history.back()" class="btn btn-link btn-sm" title="&larr; Ou continue comprando">&larr; Ou continue comprando</a>
          @elseif($product->qtd_last <= 25)
            <span class="bg-danger btn btn-sm product-form-price">Restam apenas {{ $product->qtd_last }}</span>
          @else
            <span class="bg-success btn btn-sm product-form-price text-white">Disponível</span>
          @endif
        </h3>
        <div class="mt-5"></div>
        <div class="card">
          <div class="form-group price_elem row mt-3 text-center">
            <div class="col-sm-12 col-md-12">
              <h4 class="product-form-price" id="product-form-price">R$ {{ $product->price }}</h4>
            </div>
          </div>
          <form name="addToCart" action="{{ route('cart.add') }}" method="get">
          <div class="form-group row mt-2 d-flex justify-content-center">
            <label for="Quantity" class="col-sm-3 col-md-3 form-control-label mt-2">Quantidade:</label>
            <div class="col-sm-2 col-md-2">
              <input type="number" class="form-control{{ $errors->has('qty') ? ' is-invalid' : '' }}" name="qty" min='1' max="100" value="1">
            </div>
            @if ($errors->has('qty'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('qty') }}</strong>
              </span>
            @endif
          </div>
          <input type="hidden" name="product_id" value="{{$product->id}}">
          <div class="col-sm-12 col-md-12 mt-2 row d-flex justify-content-center mb-3">
            <button type="button" style="background-color:#76323f" onclick="document.addToCart.submit();" class="btn text-white">Adicionar ao carrinho</button>  
          </div>
        </div>
      </div>
      </form>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h2>Informações do produto</h2>
      </div>

      <div class="card ml-3 w-100">
        <div class="form-group row ml-2 mt-2">
          <label for="descricao" class="col-md-4"><h5>Descrição:</h5></label>
          <div id="descricao" class="col-md-8">{{ $product->description }}</div>
        </div>
        <div class="form-group row ml-2 mt-2">
          <label for="peso" class="col-md-4"><h5>Peso:</h5></label>
          <div id="peso" class="col-md-8">{{ $product->weight }} g</div>
        </div>
        <div class="form-group row ml-2 mt-2">
          <label for="comprimento" class="col-md-4"><h5>Comprimento:</h5></label>
          <div id="comprimento" class="col-md-8">{{ $product->width }} cm</div>
        </div>
        <div class="form-group row ml-2 mt-2">
          <label for="altura" class="col-md-4"><h5>Altura:</h5></label>
          <div id="altura" class="col-md-8">{{ $product->height }} cm</div>
        </div>
        <div class="form-group row ml-2 mt-2">
          <label for="largura" class="col-md-4"><h5>Largura:</h5></label>
          <div id="largura" class="col-md-8">{{ $product->lenght }} cm</div>
        </div>
      </div>
    </div><br>
    <div class="row">
      <div class="card ml-3 w-100">
        <div class="form-group row ml-2 mt-2">
          <label class="col-sm-3 col-md-3 form-control-label nopaddingtop"><h5>Avalie o produto:</h5></label>
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
              <button class="btn btn-primary btn-sm mt-2" style="background-color:#76323f" type="submit">Avaliar</button>
            </form>
          </div>
        </div>
      </div>
    </div><br>
    <div class="row">
      <div class="col-md-12">
        <h2>Outros produtos</h2>
      </div>

      <?php $i = 0; ?>
      @foreach(Doomus\Product::all() as $product)
        <?php $images = $product->image; ?>
        <div class="col-md-4">
          <div class="card">
            @foreach($product->image as $image)
              @if(isset($image) && $image !== null && $image->filename !== null || $image->filename !== '')
                <div class="card-image">
                  <img src="/img/products/{{$image->filename}}" width="300px" height="200px" alt="Produto" class="img-fluid">
                </div>
              @elseif(!isset($image))  
                <div class="card-image">
                  <img src="/img/doomus.png" alt="Produto" class="img-fluid">
                </div>
              @endif
            @endforeach
            <h3 class="card-title">{{ $product->name }}</h3>
            <a class="btn text-white" style="background-color:#76323f" href="/carrinho/{{ $product->id }}/add">Adicionar ao carrinho</a><br>      
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
@endsection

@section('scripts')

@endsection
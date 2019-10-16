@extends('layouts.new_layout')

@section('stylesheets')
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet"/>
@endsection

@section('title', $product->name)

@section('content')
  <div class="container">
    <div class="row mt-3">
      <div class="col-lg-7 mb-3">
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
                    <img class="d-block w-100" height="400px" src="{{asset("/img/products/".$image->filename)}}">
                  </div>
                @else
                  <div class="carousel-item">
                    <img class="d-block w-100" height="400px" src="{{asset("/img/products/".$image->filename)}}">
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
      <div class="col-lg-5">
        <h3 class="">{{ $product->name }} &nbsp;</h3>
        <h5>
          @php
            $rating = $product->ratingPercent(100);
          @endphp
          @for ($i = 1; $i <= 5; $i++)
            @if($i > $rating)

              @if($i - 0.7 > $rating)
                <i class="material-icons">star_border</i>
              @elseif($i - 0.3 < $rating)
                <i class="material-icons">star</i>
              @else
                <i class="material-icons">star_half</i>
              @endif

            @elseif($i <= $rating)
              <i class="material-icons">star</i>
            @endif

            @if($i == 5)
              ({{ $rating }})
            @endif  
          @endfor
        </h5>
        @if($product->qtd_last == 0)
          <span class="bg-warning btn product-form-price">Esgotado</span>
          <p class="mb-0 mt-1">Infelizmente este produto está esgotado. 😥</p>
          <p>Para mais detalhes, contate-nos!</p>
          <a href="#" class="btn btn-info" title="Contate-nos">Contate-nos</a>
          <a href="javascript:history.back()" class="btn btn-link btn-sm" title="&larr; Ou continue comprando">&larr; Ou continue comprando</a>
        @elseif($product->qtd_last <= 25)
          <span class="bg-info btn product-form-price">Restam {{ $product->qtd_last }} unidades</span>
        @else
          <span class="bg-success btn btn-sm product-form-price">Disponível</span>
        @endif
        <div class="card mt-3">
          <h3 class="d-flex justify-content-center align-items-center mb-0 mt-2">
            <span class="font-weight-bold">
              R$ 
              @php
                $formatted_price = number_format($product->price, 2, ',', '');   
                echo $formatted_price; 
              @endphp
            </span>
          </h3>
          <span class="d-flex justify-content-center text-success">
            6x de 
            @php
              $parcel = $product->price / 6;
              $formatted_parcel = intval(strval($parcel * 100)) / 100;
              echo $formatted_parcel;   
            @endphp
            s/juros ou 
          </span>
          <span class="d-flex justify-content-center text-success">
              12x de
            @php
              $parcel = $product->price / 12;
              $formatted_parcel = intval(strval($parcel * 100)) / 100;
              echo $formatted_parcel;    
            @endphp
            s/juros no cartão Doomus
          </span>
          <span class="d-flex justify-content-center mt-2">
            Veja as nossas outras formas de parcelamento!
          </span>
          <span class="d-flex justify-content-center">
            <button class="btn btn-link pt-0">Formas de parcelamento</button>
          </span>
          <form name="addToCart" action="{{ route('cart.add') }}" method="get">
          <div class="form-group row mt-2 d-flex justify-content-center">
            <label for="Quantity" class="col-lg-3 col-sm-3 col-md-3 form-control-label mt-2">Quantidade:</label>
            <div class="col-lg-3 col-sm-2 col-md-2">
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
            <button type="button" style="background-color:#76323f" onclick="document.addToCart.submit();" class="mdc-button mdc-button--raised">
              <span class="mdc-button__label">Adicionar ao carrinho</span>
            </button>  
          </div>
        </div>
      </div>
      </form>
    </div>
    <div class="row justify-content-center">
      <div class="w-100" id="info-accordion">
        <div class="card">
          <div class="card-header" id="info-accordion-header">
            <h5 class="d-flex justify-content-between align-items-center mb-0 p-2">
              <span>Informações do produto</span>
              <i class="fas fa-plus" id="info-accordion-icon"></i>
            </h5>
          </div>
          <div id="info-accordion-collapse" class="collapse" aria-labelledby="info-accordion-header" data-parent="#info-accordion">
            <div class="card-body">
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
          </div>
        </div>       
      </div>
    </div>
    <div class="row mt-2 mb-2">
      <div class="col-md-12">
        <h3>Outros produtos</h3>
      </div>

      <?php $i = 0; ?>
      @foreach(Doomus\Product::all() as $product)
      <div class="col-lg-4 col-xl-4 col-md-6 col-sm-12 col-xs-12 mt-2">
          <div class="mdc-card">
            <div class="mdc-card__primary-action product-card-action" tabindex="0" data-id="{{$product->id}}">
              @if(isset($product->image[0]->filename))
                <div class="mdc-card__media mdc-card__media--16-9 mdc-card__media--square"
                  style="background-image: url(&quot;{{asset("/img/products/".$product->image[0]->filename)}}&quot;);width:100%;">
                </div>
              @else
                <div class="mdc-card__media mdc-card__media--16-9 mdc-card__media--square mx-auto"
                  style="background-image: url(&quot;{{asset("/img/logo_icone.png")}}&quot;);width:80%">
                </div>
              @endif
              <div class="p-2 ml-2">
                <h6 class="mdc-typography mb-0 mdc-typography--headline6 font-weight-bold">{{$product->name}}</h6>
                @php 
                  $rating = $product->ratingPercent(100);
                @endphp
                @for ($i = 1; $i <= 5; $i++)
                  @if($i > $rating)
                    @if($i - 0.7 > $rating)
                      <i class="material-icons">star_border</i>
                    @elseif($i - 0.3 < $rating)
                      <i class="material-icons">star</i>
                    @else
                      <i class="material-icons">star_half</i>
                    @endif
                  @elseif($i <= $rating)
                    <i class="material-icons">star</i>
                  @endif
                  @if($i == 5)
                    ({{ $rating }})
                  @endif
                @endfor
                <h4 class="font-weight-normal mb-0">
                  R$
                  @php
                    $formatted_price = number_format($product->price, 2, ',', '');   
                    echo $formatted_price;
                  @endphp
                </h4>
                <span class="text-success">6x de  
                  @php
                    $parcel = $product->price / 6;
                    $formatted_parcel = intval(strval($parcel * 100)) / 100;
                    echo $formatted_parcel;   
                  @endphp
                  s/juros</span>      
              </div>
            </div>
            <div class="mdc-card__actions">
              <div class="mdc-card__action-icons">
                <button class="mdc-icon-button material-icons mdc-card__action mdc-card__action--icon--unbounded addProductToCart" title="Adicionar no carrinho" data-mdc-ripple-is-unbounded="true">shopping_cart</button>
              </div>
            </div>
          </div>
        </div>
        @if ($loop->iteration == 3)
          @break;
        @endif
      @endforeach
    </div>
@endsection

@section('scripts')
  <script src="{{asset('js/customJs/product.js')}}"></script>
@endsection
@extends('layouts.layout')

@section('stylesheets')
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet"/>
@endsection

@section('title', $product->name)

@section('content')
  @php

    if ($product->discount !== null) {
      $product_price_principal = $product->price - ($product->price * $product->discount);
      $formatted_price = number_format($product_price_principal, 2, ',', '');   
      $formatted_parcel_6 = number_format(intval(strval(($product_price_principal / 6) * 100)) / 100, 2, ',', '');
      $formatted_parcel_12 = number_format(intval(strval(($product_price_principal / 12) * 100)) / 100, 2, ',', '');
    } else {
      $product_price_principal = $product->price;
      $formatted_price = number_format($product->price, 2, ',', '');   
      $formatted_parcel_6 = number_format(intval(strval(($product->price / 6) * 100)) / 100, 2, ',', '');
      $formatted_parcel_12 = number_format(intval(strval(($product->price / 12) * 100)) / 100, 2, ',', '');
    }
  @endphp
  <div class="container">
    <div class="row mt-3">
      <div class="col-lg-7 mb-3">
        @if(count($product->image) == 0)
          <div class="text-center" style="margin-top:170px">
            <h6>Esse produto não possui imagem no momento</h6>
          </div>
        @else
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
        @endif
      </div>
      <div class="col-lg-5">
        <h3 class="">{{ $product->name }} &nbsp;</h3>
        <h5>
          @php
            $rating = $product->mediaNotaAvaliacao();
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
              R$ {{$formatted_price}}
            </span>
          </h3>
          <span class="d-flex justify-content-center text-success">
            6x de R$ {{$formatted_parcel_6}} s/juros ou 
          </span>
          <span class="d-flex justify-content-center text-success">
            12x de R$ {{$formatted_parcel_12}} s/juros no cartão Doomus
          </span>
          <span class="d-flex justify-content-center mt-2">
            Veja as nossas outras formas de parcelamento!
          </span>
          <span class="d-flex justify-content-center">
            <button class="btn btn-link pt-0" data-toggle="modal" data-target="#payment-forms-modal">Formas de parcelamento</button>
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
            <button type="button" onclick="document.addToCart.submit();" class="mdc-button mdc-button--raised general-button">
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
                <div id="comprimento" class="col-md-8">{{ $product->lenght }} cm</div>
              </div>
              <div class="form-group row ml-2 mt-2">
                <label for="altura" class="col-md-4"><h5>Altura:</h5></label>
                <div id="altura" class="col-md-8">{{ $product->height }} cm</div>
              </div>
              <div class="form-group row ml-2 mt-2">
                <label for="largura" class="col-md-4"><h5>Largura:</h5></label>
                <div id="largura" class="col-md-8">{{ $product->width }} cm</div>
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
      @foreach(Doomus\Product::where('id', '!=', $product->id)->orderBy('id', 'DESC')->get() as $product)
      @php
          $formatted_price = number_format($product->price, 2, ',', '');
          $formatted_parcel_6 = intval(strval(($product->price / 6) * 100)) / 100;
      @endphp
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
                <h6 class="mdc-typography mb-0 mdc-typography--headline6 font-weight-bold">{{$product->nome}}</h6>
                @php 
                  $rating = $product->mediaNotaAvaliacao();
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
                  R$ {{$formatted_price}}
                </h4>
                <span class="text-success">6x de {{$formatted_parcel_6}} s/juros</span>      
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
    <div class="modal fade" id="payment-forms-modal" tabindex="´-1" role="dialog" aria-labelledby="Formas de pagamento" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <nav class="p-1">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-credit-card-tab" data-toggle="tab" href="#nav-credit-card" role="tab" aria-controls="nav-credit-card" aria-selected="true"><i class="fas fa-credit-card"></i></a>
              <a class="nav-item nav-link" id="nav-credit-card-doomus-tab" data-toggle="tab" href="#nav-credit-card-doomus" role="tab" aria-controls="nav-credit-card-doomus" aria-selected="false"><i class="fas fa-credit-card"> Doomus</i></a>
              <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fas fa-money-bill"> Boleto</i></a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-credit-card" role="tabpanel" aria-labelledby="nav-credit-card-tab">
              <p class="text-center font-weight-bold mt-2">Cartão de crédito ou débito</p>
              <hr>
              <div class="d-flex justify-content-center">
                <div class="d-flex flex-column">
                  @for ($i = 1; $i <= 6; $i++)
                    <div class="mb-0">
                      <p class="mb-0">
                        {{$i}}x de 
                        @php
                          $formatted_parcel = number_format(intval(strval(($product_price_principal / $i) * 100)) / 100, 2, ',', '');
                          echo $formatted_parcel;    
                        @endphp
                        s/juros
                      </p>   
                      <hr>
                    </div>
                  @endfor
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="nav-credit-card-doomus" role="tabpanel" aria-labelledby="nav-credit-card-doomus-tab">
              <p class="text-center font-weight-bold mt-2">Cartão de crédito Doomus</p>
              <hr>
              <div class="d-flex justify-content-center">
                <div class="d-flex flex-column">
                  @for ($i = 1; $i <= 6; $i++)
                    <div class="mb-0">
                      <p class="mb-0">
                        {{$i}}x de R$ 
                        @php
                          $formatted_parcel = number_format(intval(strval(($product_price_principal / $i) * 100)) / 100, 2, ',', '');
                          echo $formatted_parcel;
                        @endphp
                        s/juros
                      </p>
                      <hr>
                    </div>  	
                  @endfor
                </div>
                <div class="ml-2 d-flex flex-column">
                  @for ($i = 7; $i <= 12; $i++)
                    <div class="mb-0">
                      <p class="mb-0">
                        {{$i}}x de R$ 
                        @php
                          $formatted_parcel = number_format(intval(strval(($product_price_principal / $i) * 100)) / 100, 2, ',', '');
                          echo $formatted_parcel;
                        @endphp
                        s/juros
                      </p>  
                      <hr>
                    </div>    
                  @endfor
                </div>
              </div>
            </div>  
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
              <p class="text-center font-weight-bold mt-2">Boleto Bancário</p>
              <hr>
              <p class="text-center">
                1x de R$ 
                @php
                  $product_discount = $product_price_principal * 0.1;
                  $formatted_price = number_format($product_price_principal - $product_discount, 2, ',', '');
                  echo $formatted_price;
                @endphp
              </p>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{asset('js/customJs/product.js')}}"></script>
@endsection
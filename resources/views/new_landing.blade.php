@extends('layouts.layout')

@section('title', 'Página inicial - Doomus')

@section('stylesheets')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.2.3/dist/css/uikit.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.3/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.3/dist/js/uikit-icons.min.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 col-md-12 col-sm-12 h-100">
        <div id="carouselExampleIndicators" class="banner-carousel-main-slide carousel slide h-100" data-ride="carousel">
          <ol class="carousel-indicators" style="z-index: 3;">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          </ol>
          <div class="banner-carousel-inner carousel-inner h-50" style="border-radius: 0px;">
            <div class="carousel-item active">
              <a href="/produto/10"><img src="{{asset('/img/landing/banner-cama.png')}}" style="width:100%;height:auto;" class="d-block" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href="/produto/1"><img src="{{asset('/img/landing/banner-toalha.png')}}" style="width:100%;height:auto" class="d-block" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href="/produto/9"><img src="{{asset('/img/landing/banner-roupao.png')}}" style="width:100%;height:auto" class="d-block" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href="/produto/3"><img src="{{asset('/img/landing/banner-travesseiro.png')}}" style="width:100%;height:auto" class="d-block" alt="..."></a>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    <div class="row mt-3" id="card-slider">
      <div class="w-100 align-items-center justify-content-center mb-3 p-2" style="background-color: rgba(215, 206, 199, .2)">
        <h3 class="text-center mb-0 font-weight-bold">Produtos em promoção</h3>
      </div>
      <div class="uk-position-relative uk-visible-toggle uk-dark" tabindex="-1" uk-slider="sets: true">
        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-grid">
          @foreach ($products_with_discount as $product_with_discount)
            <li>
              <div class="uk-panel">
                <div class="mdc-card mb-3">
                  <div class="mdc-card__primary-action product-card-action" tabindex="0" data-id="{{$product_with_discount->id}}">
                    @if(isset($product_with_discount->image[0]->filename))
                      <div class="img-fluid mdc-card__media mdc-card__media--16-9 mdc-card__media--square"
                        style="background-image: url(&quot;{{asset("/img/products/".$product_with_discount->image[0]->filename)}}&quot;)">
                      </div>
                    @else
                      <div class="img-fluid mdc-card__media mdc-card__media--16-9 mdc-card__media--square"
                        style="background-image: url(&quot;{{asset("/img/logo_icone.png")}}&quot;)">
                      </div>
                    @endif
                    <div class="p-2 ml-2" style="height: 177px">
                      <h6 class="mdc-typography mb-0 mdc-typography--headline6 font-weight-bold" style="font-size: 1rem">{{$product_with_discount->name}}</h6>
                      @php 
                        $rating = $product_with_discount->mediaNotaAvaliacao();
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
                      @php
                        $price = $product_with_discount->price - ($product_with_discount->price * $product_with_discount->discount);
                        $formatted_price = number_format($price, 2, ',', ''); 
                        $formatted_price_without_discount = number_format($product_with_discount->price, 2, ',', ''); 
                      @endphp
                      @if ($product_with_discount->discount !== null)
                        <h6 class="font-weight-normal mb-0 text-muted mt-2 d-flex align-items-center">
                          <span style="text-decoration: line-through">R$ {{$formatted_price_without_discount}}</span> 
                          <span class="badge badge-success w-25 h-50 ml-1"><i class="fas fa-arrow-down"></i> {{$product_with_discount->discount * 100}}%</span>
                        </h6>
                        <h4 class="mt-1 mb-3">R$ {{$formatted_price}}</h4>   
                      @else
                        <h4 class="font-weight-normal mb-0 mt-1">
                          R$ {{$formatted_price}}
                        </h4>    
                      @endif
                      @if ($product_with_discount->price > 30)
                        <span class="text-success">6x de R$ 
                          @php
                            $parcel = $price / 6;
                            $formatted_parcel = intval(strval($parcel * 100)) / 100;
                            echo $formatted_parcel;   
                          @endphp
                          s/juros</span>
                      @endif
                    </div>
                  </div>
                  <div class="mdc-card__actions">
                    <div class="mdc-card__action-icons">
                      @if($product_with_discount->qtd_last == 0)
                      <span class="bg-warning btn">Esgotado</span>
                      @else
                        {{-- <form id="comprarAgora-form{{$loop->iteration}}" action="{{ route('comprarAgora') }}" method="POST" class="d-none">
                          {{ csrf_field() }}
                          <input type="hidden" name="product_id" value="{{ $product_with_discount->id }}">
                        </form>
                        <a class="btn btn-success mr-2" style="font-size:0.8em;" onclick="event.preventDefault(); document.getElementById('comprarAgora-form{{$loop->iteration}}').submit()">
                            <span class="mdc-button__label">Comprar agora</span>
                        </a> --}}
                        <a href="{{route('cart.fastAdd', ['product_id'=>$product_with_discount->id])}}" class="mdc-icon-button material-icons mdc-card__action mdc-card__action--icon--unbounded cart-add-icon-button" title="Adicionar no carrinho" data-mdc-ripple-is-unbounded="true">add_shopping_cart</a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </li>
          @endforeach
        </ul>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
      </div>
    </div>
    <div class="row mt-3">
      <div class="w-100 align-items-center justify-content-center mb-3 p-2" style="background-color: rgba(215, 206, 199, .2)">
        <h3 class="text-center mb-0 font-weight-bold">Produtos diversos</h3>
      </div>
      @foreach ($products as $product)
        <div class="col-lg-4 col-xl-3 col-md-6 col-sm-12 col-xs-12 mt-2">
          <div class="mdc-card mb-3">
            <div class="mdc-card__primary-action product-card-action" tabindex="0" data-id="{{$product->id}}">
              @if(isset($product->image[0]->filename))
                <div class="mdc-card__media mdc-card__media--16-9 mdc-card__media--square"
                  style="background-image: url(&quot;{{asset("/img/products/".$product->image[0]->filename)}}&quot;);width:100%;">
                </div>
              @else
                <div class="mdc-card__media mdc-card__media--16-9 mdc-card__media--square"
                  style="background-image: url(&quot;{{asset("/img/logo_icone.png")}}&quot;)">
                </div>
              @endif
              <div class="p-2 ml-2" style="height: 140px">
                <h6 class="mdc-typography mb-0 mdc-typography--headline6 font-weight-bold" style="font-size: 1rem">{{$product->name}}</h6>
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
                <h4 class="font-weight-normal mb-0 mt-1">
                  R$
                  @php
                    $formatted_price = number_format($product->price, 2, ',', '');   
                    echo $formatted_price;
                  @endphp
                </h4>
                @if ($product->price > 30)
                  <span class="text-success">6x de R$  
                    @php
                      $parcel = $product->price / 6;
                      $formatted_parcel = intval(strval($parcel * 100)) / 100;
                      echo $formatted_parcel;   
                    @endphp
                    s/juros</span>
                @endif
              </div>
            </div>
            <div class="mdc-card__actions" style="height: 64px">
              <div class="mdc-card__action-icons">
                @if($product->qtd_last == 0)
                <span class="bg-warning btn">Esgotado</span>
                @else
                {{-- <form id="comprarAgora-form{{$loop->iteration}}" action="{{ route('comprarAgora') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                  </form>
                  <a class="btn btn-success mr-2" style="font-size:0.8em;" onclick="event.preventDefault(); document.getElementById('comprarAgora-form{{$loop->iteration}}').submit()">
                      <span class="mdc-button__label">Comprar agora</span>
                  </a> --}}
                  <a href="{{route('cart.fastAdd', ['product_id'=>$product->id])}}" class="mdc-icon-button material-icons mdc-card__action mdc-card__action--icon--unbounded cart-add-icon-button" title="Adicionar no carrinho" data-mdc-ripple-is-unbounded="true">add_shopping_cart</a>
                @endif
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <input type="text" id="searchInput" class="form-control form-control-lg d-none mt-4 position-fixed input-search-sm-devices" autocomplete="none">
    <div class="" aria-labelledby="searchInput">
      <ul class="dropdown-menu" id="searchResult"></ul>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{asset('/js/customJs/landing.js')}}"></script>
@endsection
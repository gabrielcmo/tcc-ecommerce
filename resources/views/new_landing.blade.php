@extends('layouts.layout')

@section('content')
  <div class="row justify-content-center">
    <div class="col-lg-10 h-50">
      <div id="carouselExampleIndicators" class="carousel slide h-100" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" style="border-radius: 0px;">
          <div class="carousel-item active" style="">
            <img src="{{asset('img/capa1.jpg')}}" class="d-block w-100 h-100" alt="...">
          </div>
          <div class="carousel-item" style="">
            <img src="{{asset('img/capa2.png')}}" class="d-block w-100 h-100" alt="...">
          </div>
          <div class="carousel-item" style="">
            <img src="{{asset('img/capa3.jpg')}}" class="d-block w-100 h-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{asset('/img/landing/banner-travesseiro.png')}}" style="width:100%;height:auto" class="d-block" alt="...">
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
  <div class="mt-5"></div>
  <div class="container">
    <div class="row">
      @foreach ($products as $product)
        <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-12 mt-2">
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
      @endforeach
    </div>
    <button class="mdc-fab app-fab--absolute general-button d-none" aria-label="Pesquisar produto" id="toggleSearchBarButton">
      <span class="mdc-fab__icon material-icons">search</span>
    </button>
    <input type="text" class="form-control form-control-lg d-none mt-4 position-fixed input-search-sm-devices">
  </div>
@endsection

@section('scripts')
  <script src="{{asset('js/customJs/landing.js')}}"></script>
@endsection
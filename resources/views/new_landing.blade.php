@extends('layouts.layout')

@section('title', 'Página inicial - Doomus')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 h-50">
        <div id="carouselExampleIndicators" class="carousel slide h-100" data-ride="carousel">
          <ol class="carousel-indicators" style="z-index: 3;">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner h-50" style="border-radius: 0px;">
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
    <div class="mt-5"></div>
    <div class="row">
      @foreach ($products as $product)
        <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-12 mt-2">
          <div class="mdc-card mb-4">
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
                  R$
                  @php
                    $formatted_price = number_format($product->price, 2, ',', '');   
                    echo $formatted_price;
                  @endphp
                </h4>
                @if ($product->valor > 30)
                  <span class="text-success">6x de  
                    @php
                      $parcel = $product->valor / 6;
                      $formatted_parcel = intval(strval($parcel * 100)) / 100;
                      echo $formatted_parcel;   
                    @endphp
                    s/juros</span>
                @endif
              </div>
            </div>
            <div class="mdc-card__actions">
              <div class="mdc-card__action-icons">
                @if($product->qtd_last == 0)
                <span class="bg-warning btn">Esgotado</span>
                @else
                <form id="comprarAgora-form" action="{{ route('comprarAgora') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                  </form>
                  <a class="btn btn-success mr-2" style="font-size:0.8em;" onclick="event.preventDefault(); document.getElementById('comprarAgora-form').submit()" href="#">
                      <span class="mdc-button__label">Comprar agora</span>
                  </a>
                  <a href="{{route('cart.fastAdd', ['product_id'=>$product->id])}}" class="mdc-icon-button material-icons mdc-card__action mdc-card__action--icon--unbounded cart-add-icon-button" title="Adicionar no carrinho" data-mdc-ripple-is-unbounded="true">shopping_cart</a>
                @endif
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <input type="text" class="form-control form-control-lg d-none mt-4 position-fixed input-search-sm-devices">
  </div>
@endsection

@section('scripts')
  <script src="{{asset('js/customJs/landing.js')}}"></script>
@endsection
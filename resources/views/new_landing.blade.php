@extends('layouts.new_layout')

@section('content')
  <div class="row justify-content-center mt-1">
    <div class="col-lg-12">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
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
  </div><br>
  <div class="container">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-lg-2 col-xl-3 col-md-6 col-sm-12 col-xs-12 mt-1">
          <div class="card ml-2 mr-2 mt-2" style="width: 17rem;">
            <div class="mdc-card__media mdc-card__media--16-9 mdc-card__media--square"
              style="background-image: url(&quot;{{asset('img/capa_13.jpg')}}&quot;);">
            </div>
            <div class="card-body">
              <h4 class="card-title">{{$product->name}}</h4>
              <?php $rating = $product->ratingPercent(100); ?>
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
              <p class="card-text">
                <h2 class="mdc-typography mdc-typography--headline4" style="margin: 0px">R${{$product->price}}</h2>
                <h2 class="mdc-typography mdc-typography--subtitle2" style="color:gray;">10x de R$2,70 sem juros</h2>
              </p>
              <div class="d-flex">
                <a class="btn btn-primary" href="/produto/{{ $product->id }}"><h5 class="mt-1">Ver mais</h5></a>
                <a class="ml-auto" href="/carrinho/{{ $product->id }}/add"><i class="mdc-icon-button material-icons">shopping_cart</i></a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{asset('js/configLanding.js')}}"></script>
@endsection
@extends('layouts.new_layout')

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
<<<<<<< HEAD
        <div class="carousel-inner" style="border-radius: 0px;">
          <div class="carousel-item active" style="">
            <img src="{{asset('img/capa1.jpg')}}" class="d-block w-100 h-100" alt="...">
          </div>
          <div class="carousel-item" style="">
            <img src="{{asset('img/capa2.png')}}" class="d-block w-100 h-100" alt="...">
          </div>
          <div class="carousel-item" style="">
            <img src="{{asset('img/capa3.jpg')}}" class="d-block w-100 h-100" alt="...">
=======
        <div class="carousel-inner h-50" style="border-radius: 0px;">
          <div class="carousel-item active">
            <img src="{{asset('/img/landing/banner-cama.png')}}" style="width:100%;height:auto;" class="d-block" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{asset('/img/landing/banner-toalha.png')}}" style="width:100%;height:auto" class="d-block" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{asset('/img/landing/banner-roupao.png')}}" style="width:100%;height:auto" class="d-block" alt="...">
>>>>>>> b7b0ab7b5723493caee13a62171b6b6812ae1840
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
  <div class="jumbotron jumbotron-fluid text-white mt-2" style="background-image: url({{ asset('/img/imgbanner.jpg') }});">
    <div class="container">
      <h1 class="display-4">As melhores ofertas</h1>
      <p class="lead">O tempo está acabando! <a class="text-warning" href="{{route('offers')}}">Clique aqui para ver nossas promoções</a></p>
    </div>
  </div>
  <div class="container">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-12 mt-1">
          <div class="card ml-2 mr-2 mt-2" style="width: 15rem;">
            @if(isset($product->image[0]->filename))
              <div class="mdc-card__media mdc-card__media--16-9 mdc-card__media--square"
                style="background-image: url(&quot;{{asset("/img/products/".$product->image[0]->filename)}}&quot;);width:100%;">
              </div>
            @else
              <div class="mdc-card__media mdc-card__media--16-9 mdc-card__media--square mx-auto"
                style="background-image: url(&quot;{{asset("/img/logo_icone.png")}}&quot;);width:80%">
              </div>
            @endif
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
  <script src="{{asset('js/customJs/landing.js')}}"></script>
@endsection
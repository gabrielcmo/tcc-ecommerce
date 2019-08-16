@extends('layouts.new_layout')

@section('content')
<div class="row justify-content-center mt-1">
  <div class="col-lg-8">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" style="border-radius: 0px;">
        <div class="carousel-item active" style="height: 500px;">
          <img src="{{asset('img/capa_13.jpg')}}" class="d-block w-100 h-100" alt="...">
        </div>
        <div class="carousel-item" style="height: 500px">
          <img src="{{asset('img/capa_13.jpg')}}" class="d-block w-100 h-100" alt="...">
        </div>
        <div class="carousel-item" style="height: 500px">
          <img src="{{asset('img/capa_13.jpg')}}" class="d-block w-100 h-100" alt="...">
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
<div class="row justify-content-center">
  <div class="col-lg-8">
    <ul class="mdc-image-list mdc-image-list--with-text-protection my-image-list">
      <li class="mdc-image-list__item">
        <div class="mdc-image-list__image-aspect-container">
          <img class="mdc-image-list__image" src="{{asset('img/capa_13.jpg')}}" alt="..." >
        </div>
        <div class="mdc-image-list__supporting">
          <span class="mdc-image-list__label">Teste</span>
        </div>
      </li>
      <li class="mdc-image-list__item">
        <div class="mdc-image-list__image-aspect-container">
          <img class="mdc-image-list__image" src="{{asset('img/capa_13.jpg')}}" alt="..." >
        </div>
        <div class="mdc-image-list__supporting">
          <span class="mdc-image-list__label">Teste</span>
        </div>
      </li>
      <li class="mdc-image-list__item" style="position: relative">
        <div class="mdc-image-list__image-aspect-container">
          <img class="mdc-image-list__image" src="{{asset('img/capa_13.jpg')}}" alt="..." >
        </div>
        <div class="mdc-image-list__supporting">
          <span class="mdc-image-list__label">Teste</span>
        </div>
      </li>
      <li class="mdc-image-list__item">
        <div class="mdc-image-list__image-aspect-container">
          <img class="mdc-image-list__image" src="{{asset('img/capa_13.jpg')}}" alt="..." >
        </div>
        <div class="mdc-image-list__supporting">
          <span class="mdc-image-list__label">Teste</span>
        </div>
      </li>
      <li class="mdc-image-list__item">
        <div class="mdc-image-list__image-aspect-container">
          <img class="mdc-image-list__image" src="{{asset('img/capa_13.jpg')}}" alt="..." >
        </div>
        <div class="mdc-image-list__supporting">
          <span class="mdc-image-list__label">Teste</span>
        </div>
      </li>
    </ul>
  </div>
</div>
<div class="row">
<div class="col-lg-2"></div>
@foreach ($products as $product)
  <div class="col-lg-2 col-xl-2 col-md-6 col-sm-12 col-xs-12 mt-1">
    <div class="mdc-card">
      <div class="mdc-card__primary-action" tabindex="0" style="border-radius: 0px;">
        <div class="mdc-card__media mdc-card__media--16-9 mdc-card__media--square"
          style="background-image: url(&quot;{{asset('img/capa_13.jpg')}}&quot;);">
          <div class="mdc-card__media-content" style="display: flex; align-items: flex-end;">
            <h2 class="mdc-typography mdc-typography--headline6" style="color: black; padding-left: 0.5rem">{{$product->name}}</h2>
          </div>
        </div>
        <div style="padding: 0.5rem;">
          <i class="material-icons">star</i>
          <i class="material-icons">star</i>
          <i class="material-icons">star</i>
          <i class="material-icons">star</i>
          <i class="material-icons">star_half</i>
          <h2 class="mdc-typography mdc-typography--headline4" style="margin: 0px">R${{$product->price}}</h2>
          <h2 class="mdc-typography mdc-typography--subtitle2" style="color:gray;">10x de R$2,70 sem juros</h2>
        </div>
      </div>
    </div>
  </div>
@endforeach
<div class="col-lg-2"></div>
</div>


@endsection

@section('scripts')
  <script src="{{asset('js/configLanding.js')}}"></script>
@endsection
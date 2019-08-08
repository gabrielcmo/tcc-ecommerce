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
<div class="row">
  <div class="col-lg-8">
    <ul class="mdc-image-list">
      <li class="mdc-image-list-item">
        <div class="mdc-image-list__image-aspect-container">
          <img class="mdc-image-list__image" src="{{asset('img/capa_13.jpg')}}" alt="..." >
        </div>
        <div class="mdc-image-list__supporting">
          <span class="mdc-image-list__label">Doomus</span>
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
      <a id="link-card" href="/produto/{{$product->id}}">
      <div class="mdc-card__primary-action" tabindex="0" style="border-radius: 0px;">
        <div class="mdc-card__media mdc-card__media--16-9 mdc-card__media--square"
          style="background-image: url(&quot;{{asset('img/capa_13.jpg')}}&quot;);">
          <div class="mdc-card__media-content" style="display: flex; align-items: flex-end;">
            <h2 class="mdc-typography mdc-typography--headline6" style="color: black; padding-left: 0.5rem">{{$product->name}}</h2>
          </div>
        </div>
        <div style="padding: 0.5rem;">
          <?php $rating = $product->ratingPercent(100); ?>
          @for ($i = 1; $i <= 5; $i++)
            @if($i > $rating)
              <i class="material-icons">star_border</i>
            @elseif($i < $rating)
              @if($i + 0.7 < $rating)
                <i class="material-icons">star</i>
              @elseif($i + 0.3 > $rating)
                <i class="material-icons">star_border</i>
              @else
                <i class="material-icons">star_half</i>
              @endif
            @else
              <i class="material-icons">star</i>
            @endif
            @if($i == 5)
              ({{ $rating }})
            @endif
          @endfor
          <h2 class="mdc-typography mdc-typography--headline4" style="margin: 0px">R${{$product->price}}</h2>
          <h2 class="mdc-typography mdc-typography--subtitle2" style="color:gray;">10x de R$2,70 sem juros</h2>
        </div>
      </div></a>
      <div class="mdc-card__actions">
        <div class="mdc-card__action-buttons">
          <button class="mdc-button mdc-card__action mdc-card__action--button">
            <a href="/carrinho/{{ $product->id }}/add"><i class="mdc-icon-button material-icons mdc-card__action mdc-card__action--button">shopping_cart</i></a>
          </button>
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
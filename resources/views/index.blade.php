@extends('layouts.default')

@section('title', 'Home')

@section('styles')
  <link href="{{ asset('/css/styleHome.min.css') }}" rel="stylesheet"/>
@endsection

@section('content')
  <div class="container">
    <div class="row">
      @foreach($products as $product)
        <div class="row align-items-center">
          <div class="col-lg-4 mt-1">
            <div class="mdc-card">
              <div class="mdc-card__primary-action">
                @foreach ($product->image as $image)
                  <img class="mdc-card__media mdc-card__media--16-9 mdc-card__media--square" src="{{asset("img/products/$image->filename")}}">   
                @endforeach
                  <div class="mdc-card__media-content" style="display: flex; align-items: flex-end;">
                    <h2 class="mdc-typography mdc-typography--headline6" style="color: white; padding-left: 0.5rem">{{$product->name}}</h2>
                  </div>
                </div>
              </div>
              <div class="mdc-card__actions">
                <button class="mdc-icon-button material-icons mdc-card__action mdc-card_action--button" aria-label="Add to cart">
                  add_shopping_cart
                </button>
              </div>
            </div>
          </div> 
        </div>
      @endforeach
    </div>
  </div>
@endsection
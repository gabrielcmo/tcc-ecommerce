@extends('layouts.new_layout')

@section('content')
<div class="row align-items-center">
  <div class="col-lg-4 mt-1">
    <div class="mdc-card">
      <div class="mdc-card__primary-action" tabindex="0">
        <div class="mdc-card__media mdc-card__media--16-9 mdc-card__media--square" style="background-image: url(&quot;{{asset('img/capa_13.jpg')}}&quot;);">
          <div class="mdc-card__media-content" style="display: flex; align-items: flex-end;">
            <h2 class="mdc-typography mdc-typography--headline6" style="color: white; padding-left: 0.5rem">Lucian, o purificador</h2>
          </div>
        </div>
      </div>
      <div class="mdc-card__actions">
        <button class="mdc-icon-button material-icons mdc-card__action mdc-card_action--button" aria-label="Add to cart">
          add_shopping_cart
        </button>
      </div>
    </div>

    <select class="mdc-select__native-control" id="basic-select"><option value="grains" aria-selected="true">Bread, Cereal, Rice, and Pasta</option><option value="vegetables" disabled="">Vegetables</option><option value="fruit">Fruit</option><option value="dairy">Milk, Yogurt, and Cheese</option><option value="meat">Meat, Poultry, Fish, Dry Beans, Eggs, and Nuts</option><option value="fats">Fats, Oils, and Sweets</option></select>

  </div> 
</div>
@endsection
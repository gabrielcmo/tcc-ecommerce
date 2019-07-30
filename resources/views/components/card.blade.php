<div class="col-lg-2 col-xl-2 col-md-6 col-sm-12 col-xs-12 pr-1 pl-1">
  <div class="mdc-card__primary-action" tabindex="0">
    <div class="mdc-card__media mdc-card__media--16-9 mdc-card__media--square"
      style="background-image: url(&quot;img/products/{{asset('capa_13.png')}}&quot;);">
      <div class="mdc-card__media-content" style="display: flex; align-items: flex-end;">
        <h2 class="mdc-typography mdc-typography--headline6" style="color: black; padding-left: 0.5rem">{{$product['name']}}</h2>
      </div>
    </div>
    <div style="padding: 0.5rem;">
      <i class="material-icons">star</i>
      <i class="material-icons">star</i>
      <i class="material-icons">star</i>
      <i class="material-icons">star</i>
      <i class="material-icons">star_half</i>
      <h2 class="mdc-typography mdc-typography--headline4" style="margin: 0px">R${{$product['price']}}</h2>
      <h2 class="mdc-typography mdc-typography--subtitle2" style="color:gray;">10x de R$2,70 sem juros</h2>
    </div>
  </div>
</div>
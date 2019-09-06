@extends('layouts.new_layout')

@section('content')

<div class="row mt-4 justify-content-center">
  <div class="col-xl-8 col-lg-8">
    <h4>Meu carrinho</h4>
    <table class="table table-borderless" style="table-layout: auto; width: 100%">
      <thead id="productTableHeader">
        <tr>
          <th scope="col">Produtos</th>
          <th scope="col">Quantidade</th>
          <th scope="col">Preço</th>
          <th scope="col">Excluir</th>
        </tr>
      </thead>
      <tbody id="productTableItens">
      @foreach(Cart::content() as $item)
        <div >
          <tr>
          <td class="align-middle" style="width: 40%">
            <div class="media align-middle">
              <img src="{{asset('img/capa_13.jpg')}}" class="mr-2" alt="Product Image"
                style="width: 90px; height: 90px">
              <div class="media-body text-break">
                <h6 class="mt-0">{{ $item->name }}</h6>
                {{ $item->description }}
              </div>
            </div>
          </td>
          <td class="align-middle" style="width: 20%">
            <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--no-label" style="width: 40%">
              <input type="number" class="mdc-text-field__input" aria-label="Quantidade" min="1">
              <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__trailing"></div>
              </div>
            </div>
          </td>
          <td class="align-middle" style="width: 20%">
            <p class="mdc-typography mdc-typography--headline6">R${{ $item->price }}</p>
          </td>
          <td style="width: 20%; position: relative;">
            <button class="mdc-icon-button material-icons" style="position: absolute; top: 25%">
              close
            </button>
          </td>
        </tr>
      </div>
      
      @endforeach
      </tbody>
    </table>
  </div>
  <div class="col-xl-3 col-lg-3">
    <div class="p-2" style="background-color: gainsboro">
      <h4 class="text-center mt-1">Resumo do pedido</h4>
      <table class="table table-borderless" style="table-layout: auto; width: 100%">
        <tbody>
          <tr>
            <th style="width: 50%">Subtotal (4444)</th>
            <td style="width: 50%">R$ 100,00</td>
          </tr>
          <tr>
            <th style="width: 50%">Frete</th>
            <td style="width: 50%">R$ 10,00</td>
          </tr>
          <tr class="border-top border-dark">
            <th class="align-middle">Total</th>
            <td>
              R$ {{ Cart::total() + 10 }}
              <span class="d-block mdc-typography mdc-typography--subtitle2 text-success">10x de R$8,99 s/juros no cartão</span>
            </td>
          </tr>
          <tr>
            <td colspan="2" class="pb-0">
              <div class="mdc-button mdc-button--raised" style="width:100%">
                <i class="material-icons mdc-button__label">shopping_cart</i>
                <span class="mdc-button__label">Continuar</span>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="d-flex mt-2 p-2" style="background-color: gainsboro">
      <div class="d-flex justify-content-center align-items-center w-50">
        <div class="mdc-text-field mdc-text-field--outlined">
          <input type="text" class="mdc-text-field__input" id="cep-cart-text-field">
          <div class="mdc-notched-outline">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
              <label for="cep-cart-text-field" class="mdc-floating-label">CEP</label>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
          </div>
        </div>
      </div>
      <div class="d-flex align-items-center justify-content-center w-50">
        <div class="mdc-button mdc-button--raised h-75">
          <span class="mdc-button__label">Calcular Frete</span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/configCart.js')}}"></script>
@endsection
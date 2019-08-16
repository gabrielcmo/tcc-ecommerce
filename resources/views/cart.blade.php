@extends('layouts.new_layout')

@section('content')
  
  <div class="row mt-4">
    <div class="col-lg-12 offset-1 mb-2">
      <h2 class="mdc-typography">Meu carrinho</h2>
    </div>
    <div class="col-lg-8 col-md-7 offset-lg-1">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Produtos</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Preço</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="align-middle">
              <img class="rounded" src="{{asset('img/capa_13.jpg')}}" alt="Product Name" style="width: 100px; height: 100px">
              <span class="mdc-typography mdc-typography--subtitle1 ml-1">Samsung Galaxy S8 - 64GB</span>
            </td>
            <td class="align-middle">
              <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--no-label" style="width: 20%">
                <input type="number" class="mdc-text-field__input" aria-label="Quantidade" min="1">
                <div class="mdc-notched-outline">
                  <div class="mdc-notched-outline__leading"></div>
                  <div class="mdc-notched-outline__trailing"></div>
                </div>
              </div>
            </td>
            <td class="align-middle">
              <p class="mdc-typography mdc-typography--headline6">R$ 2000,00</p>
            </td>
          </tr>
        </tbody>
      </table>

    </div>
    <div class="col-lg-2 col-md-3 p-2" style="background-color: gainsboro">
      <div class="d-flex justify-content-center p-2">
        <h4 class="mdc-typography">Resumo do pedido</h4>
      </div>
      <div class="d-flex">  
        <div class="d-inline-flex p-2" style="width: 50%">Subtotal</div>
        <div class="d-inline-flex p-2 justify-content-end" style="width: 50%">R$200,00</div>
      </div>
      <div class="d-flex">
        <div class="d-inline-flex p-2" style="width: 50%">Frete</div>
        <div class="d-inline-flex p-2 justify-content-end" style="width: 50%">Grátis</div>
      </div>
      <hr>
      <div class="d-flex">
        <div class="d-inline-flex p-2" style="width: 50%">
          <h4>Total</h4>
        </div>
        <div class="d-inline-flex p-2 justify-content-end" style="width: 50%">
          <h5>R$ 200,00</h5>
        </div>
      </div>
      <div class="d-flex justify-content-end p-2" style="margin-top: -8%; color: green;">
        em até 10x s/juros
      </div>
      <hr>
      <div class="d-flex">
        <button class="mdc-button mdc-button--raised" style="width: 100%">
          <i class="material-icons mdc-button__icon" aria-hidden="true">shopping_cart</i>
          <span class="mdc-button__label">Continuar</span>
        </button>
      </div>
      {{-- <table class="table table-borderless">
        <tbody>
          <tr>
            <th scope="row">Total Frete</th>
            <td>R$ 25,00</td>
          </tr>
          <tr>
            <th scope="row">Prazo de entrega</th>
            <td>5 dias</td>
          </tr>
          <tr>
            <th scope="row">Total Compra</th>
            <td>R$421031,120</td>
          </tr>
        </tbody> --}}
      </table>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{asset('js/configCart.js')}}"></script>
@endsection
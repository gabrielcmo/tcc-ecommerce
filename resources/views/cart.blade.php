@extends('layouts.new_layout')

@section('content')
  
  <div class="row mt-4 justify-content-center">
    <div class="col-lg-7">
      <h2 class="mdc-typography">Meu carrinho</h2>
      <table class="table table-borderless">
        <thead class="d-none">
          <tr>
            <th scope="col">Produtos</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Preço</th>
          </tr>
        </thead>
        <tbody>
          <div class="">
            <tr >
              <td>
                <img class="rounded" src="{{asset('img/capa_13.jpg')}}" alt="Product Name" style="width: 100px; height: 100px">
                <span class="mdc-typography mdc-typography--subtitle1 ml-1">Samsung Galaxy S8 - 64GB</span>
              </td>
            </tr>
            <tr >
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
          </div>
          <div class="">
              <tr class="border-top border-right border-left border-dark">
                <td colspan="2">
                  <img class="rounded" src="{{asset('img/capa_13.jpg')}}" alt="Product Name" style="width: 100px; height: 100px">
                  <span class="mdc-typography mdc-typography--subtitle1 ml-1">Samsung Galaxy S8 - 64GB</span>
                </td>
              </tr>
              <tr class="border-bottom border-right border-left border-dark">
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
            </div>

          <tr class="d-none">
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
    <div class="col-lg-2 p-2" style="background-color: gainsboro">
      <h4 class="p-1 mdc-typography mdc-typography--headline6 text-center">Resumo do pedido</h4>
      <div class="table-responsive">
        <table class="table table-borderless">
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
          </tbody>
        </table>
      </div>
      <hr>
      <button class="mdc-button mdc-button--raised" style="width: 100%">
        <i class="material-icons mdc-button__icon">shopping_cart</i>
        <span class="mdc-button__label">Continuar</span>
      </button>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{asset('js/configCart.js')}}"></script>
@endsection
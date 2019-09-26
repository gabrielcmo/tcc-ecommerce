{{-- @php
  dd(Cart::content());
@endphp --}}

@extends('layouts.new_layout')

@section('content')
<div class="container">
  @if(Cart::count() == 0)
    <h4 class="text-center mt-1">Seu carrinho está vazio!</h4>
  @else
  <div class="row mt-3">
    <h3 class="ml-4">Seu carrinho</h3>
  </div>
  <div class="row mt-1">
    
    <div class="col-lg-9">
      
      <table class="table table-borderless">
        <thead>
          <tr>
            <th>Produtos</th>
            <th>Quantidade</th>
            <th>Preço</th>
          </tr>
        </thead>
        <tbody>
          @foreach (Cart::content() as $item)
          <input type="hidden" class="product_id" value="{{$item->id}}" />
          <tr>
            <td class="w-50">
              <div class="media align-items-center">
                @php
                $img = Doomus\Product::find($item->id)->image;
                @endphp
                @if(isset($img[0]->filename))
                <img src="/img/products/{{$img[0]->filename}}" )}}" class="rounded" style="height: 4.5rem; width: 4.5rem"
                  alt="...">
                @else
                <img src="/img/logo_icone.png" class="rounded" style="height: 4.5rem; width: 4.5rem" alt="...">
                @endif
                <div class="media-body text-break ml-2 mt-0">
                  {{$item->name}}
                </div>
              </div>
            </td>
            <td class="w-25 align-middle">
              <input type="number" class="form-control inputQty" style="width:4.5rem" min="1"
                value="{{ $item->qty }}" data-product="{{$loop->iteration}}">
              <a class="text-center" href="/carrinho/{{ $item->rowId }}/remove">Remover</a>
              <span class="d-none {{"productValue$loop->iteration"}}">R${{$item->price}}</span>
              <span class="d-none {{"productRowId$loop->iteration"}}">{{$item->rowId}}</span>
              <span class="d-none {{"productId$loop->iteration"}}">{{$item->id}}</span>
            </td>
            <td class="{{"newProductValue$loop->iteration"}} w-25 align-middle eachProductValue"
              data-value={{$item->price*$item->qty}}>
              R${{$item->price*$item->qty}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-lg-3 col-md-12 col-sm-12 p-3" style="background-color: #f7f5f3">
      <h4 class="d-flex justify-content-between align-items-center">
        <span class="">Resumo do pedido</span>
        <span class="badge badge-secondary">{{Cart::count()}}</span>
      </h4>
      <table class="table table-borderless">
        <tbody>
          <tr>
            <th>Subtotal</th>
            <td id="totalCart" class="text-right"></td>
          </tr>
          <tr class="d-none" id="dadosFrete">
            <th id="prazoFrete"></th>
            <td id="valorFrete" class="text-right"></td>
          </tr>
          <tr class="border-top">
            <th class="align-middle">Total</th>
            <td id="valorTotalCompra" class="text-right w-50"></td>
          </tr>
        </tbody>
      </table>
      <hr>
      <p class="p-1 mb-1">Calcule o preço e o prazo de entrega</p>
      <form action="{{route('calcFrete')}}" method="post" id="formCalcularFrete" style="border-top-color: #d7cec7">
        <div class="input-group">
          <input type="number" class="form-control" name="cep" aria-label="CEP" placeholder="CEP" aria-describedby="botao-cep">
          <div class="input-group-append">
            <button class="mdc-button mdc-button--raised general-button" id="botaoCalcularFrete" style="border-radius: 0;" data-href="{{route('calcFrete')}}">
              <span class="mdc-button__label">Calcular</span>
            </button>
          </div>
        </div>
      </form>
      <hr>
      <button class="mdc-button mdc-button--raised general-button w-100 actionButton" data-href="http://localhost:8000/checkout/endereco">
        <span class="mdc-button__label">Continuar</span>
      </button>
      @endif
    </div>
  </div>
  @endsection

  @section('scripts')
  <script src="{{asset('js/customJs/cart.js')}}"></script>
  @endsection
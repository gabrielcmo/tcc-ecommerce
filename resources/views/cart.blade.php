
@extends('layouts.layout')

@section('content')
  <div class="container">
    <div class="alert alert-danger d-none" id="qtyAlert" role="alert"></div>
    @if(Cart::count() == 0)
      <h4 class="text-center mt-4">Seu carrinho está vazio!</h4>
    @else
    <div class="row mt-3">
      <h3 class="ml-4">Seu carrinho</h3>
    </div>
    <div class="row mt-1">
    
      <div class="col-lg-8">
        
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
            <tr class="border-top" style="border-top-color: (0, 0, 0, 0.1)">
              <td class="w-50">
                <div class="media align-items-center">
                  @php
                  $img = Doomus\Product::find($item->id)->image;
                  @endphp
                  @if(isset($img[0]->filename))
                    @php
                      $img->filename = $img[0]->filename
                    @endphp
                  <img src={{asset("img/products/$img->filename")}} class="rounded" style="height: 4.5rem; width: 4.5rem"
                    alt="...">
                  @else
                  <img src="{{asset('/img/logo_icone.png')}}" class="rounded" style="height: 4.5rem; width: 4.5rem" alt="...">
                  @endif
                  <div class="media-body text-break ml-2 mt-0">
                    <a href="{{route('product.show', ['id'=>$item->id])}}">{{$item->name}}</a>
                  </div>
                </div>
              </td>
              <td class="w-25 align-middle">
                <input type="number" class="form-control inputQty" style="width:4.5rem" min="1"
                  value="{{ $item->qty }}" data-product="{{$loop->iteration}}">
                <a class="text-center" href="/carrinho/{{ $item->rowId }}/remove">Remover</a>
                <span class="d-none {{"productValue$loop->iteration"}}">R$ {{$item->price}}</span>
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
        <a class="float-right mr-2" href="/">Continuar comprando</a>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12 p-3">
        <div class="p-3" style="background-color: #f7f5f3">
          <h4 class="d-flex justify-content-between align-items-center">
            <span class="text-muted">Resumo do pedido</span>
            <span class="badge badge-secondary">{{Cart::count()}}</span>
          </h4>
        
          <table class="table table-borderless">
            <tbody>
              <tr>
                <th>Subtotal</th>
                <td id="totalCart" class="text-right"></td>
              </tr>
              @if (session('valorFrete') !== null && session('prazoFrete') !== null)
                <tr id="dadosFrete">
                  <th id="prazoFrete" data-cep={{session('cep')}}>Frete (prazo de {{ session('prazoFrete') }} dias)</th>
                  <td id="valorFrete" class="text-right" data-valor-frete="{{session('valorFrete')}}">R$ {{ session('valorFrete') }}</td>
                </tr>
                <tr class="border-top">
                  <th class="align-middle">Total</th>
                  <td id="" class="text-right w-50">R${{ Cart::total() + str_replace(',','.', session('valorFrete'))}}</td>
                </tr>
              @else
                <tr class="d-none" id="dadosFrete">
                  <th id="prazoFrete"></th>
                  <td id="valorFrete" class="text-right"></td>
                </tr>
                <tr class="border-top">
                    <th class="align-middle">Total</th>
                    <td id="valorTotalCompra" class="text-right w-50"></td>
                  </tr>
              @endif
              <tr class="border-top">
                <th class="align-middle">Total</th>
                @if (session('valorFrete') !== null && session('prazoFrete') !== null)
                  <td id="valorTotalCompra" class="text-right w-50">R$ {{Cart::total() + session('valorFrete')}}</td>
                @else
                  <td id="valorTotalCompra" class="text-right w-50">--</td>
                @endif
              </tr>
            </tbody>
          </table>
          <hr>
          <p class="p-1 mb-1">Calcule o frete e o prazo (opcional)</p>
          <form action="{{route('calcFrete')}}" method="post" id="formCalcularFrete" style="border-top-color: #d7cec7">
            <div class="input-group" id="inputBotaoCalcularFrete">
              <input type="number" class="form-control" name="cep" aria-label="CEP" placeholder="CEP" aria-describedby="botao-cep">
                <button class="mdc-button mdc-button--raised general-button" id="botaoCalcularFrete" style="border-radius: 0;" data-href="{{route('calcFrete')}}">
                  <span class="mdc-button__label" id="botaoCalcularFreteLabel">Calcular</span>
                </button>
              </div>
            </form>
            <hr>
            <button class="mdc-button mdc-button--raised general-button w-100 actionButton" data-href="{{route('address-check')}}" id="botaoContinuarCarrinho">
              <span class="mdc-button__label" id="botaoContinuarCarrinhoLabel">Continuar</span>
            </button>
          @endif
        </div>
      </div> 
    </div>
  </div>
@endsection

@section('scripts')
<script src="{{asset('js/customJs/cart.js')}}"></script>
@endsection
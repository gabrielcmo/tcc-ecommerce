@extends('layouts.new_layout')

@section('content')
<div class="">
  <div class="row justify-content-center mt-3">
    <div class="col-lg-7">
      <h4>Seu carrinho</h4>
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
          <tr>
            <td class="w-50">
              <div class="media align-items-center">
                <img src="{{asset('img/capa_13.jpg')}}" class="rounded" style="height: 80px; width: 80px" alt="...">
                <div class="media-body text-break ml-2 mt-0">
                  {{$item->name}}
                </div>
              </div>
            </td>
            <td class="w-25 align-middle">
              <input type="number" class="form-control inputQty" style="width:4.5rem" min="1" value="1" data-product="{{$loop->iteration}}">
              <a class="text-center" href="#">Remover</a>
              <span class="d-none {{"productValue$loop->iteration"}}">R${{$item->price}}</span>
            </td>
            <td class="{{"newProductValue$loop->iteration"}} w-25 align-middle">
              R${{$item->price}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-lg-2">
      <h4 class="d-flex justify-content-between align-items-center">
        <span class="">Resumo do pedido</span>
        <span class="badge badge-secondary">{{Cart::count()}}</span>
      </h4>
      <table class="table table-borderless">
        <tbody>
          <tr>
            <th>Subtotal</th>
            <td>{{}}</td>
          </tr>
          <tr>
            <th>Frete</th>
            <td></td>
          </tr>
          <tr class="border-top border-dark">
            <th class="align-middle">Total</th>
            <td>
              <span class="d-flex">R${{Cart::total()}}</span>
              <span class="d-flex text-success">10x de R${{Cart::total()/10}} s/juros no cartão</span>
            </td>
          </tr>
          <tr>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('scripts')
    <script>
      $(document).ready(function(){
        $('.inputQty').change(function (e) { 
          e.preventDefault();
          
          let product = $(e.target).data('product');
          var productValue = parseFloat($('.productValue'+product).html().substring(2).replace(',', '.'));
          let qty = $(e.target).val();
          $('.newProductValue'+product).html('R$' + productValue*qty);
        });
      });
    </script>
@endsection
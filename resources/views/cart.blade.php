@extends('layouts.new_layout')

@section('content')
<div class="">
  <div class="row justify-content-center mt-3">
    @if(Cart::count() == 0)
      <h4>Seu carrinho está vazio!</h4>
    @else
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
          <input type="hidden" class="product_rowId{{$loop->iteration}}" value="{{$item->rowId}}"/>
          <input type="hidden" class="product_id" value="{{$item->id}}"/>
          <tr>
            <td class="w-50">
              <div class="media align-items-center">
                <?php $img = Doomus\Product::find($item->id)->image; ?>
                @if(isset($img[0]->filename))
                  <img src="/img/products/{{$img[0]->filename}}")}}" class="rounded" style="height: 80px; width: 80px" alt="...">
                @else
                  <img src="/img/logo_icone.png" class="rounded" style="height: 80px; width: 80px" alt="...">
                @endif
                <div class="media-body text-break ml-2 mt-0">
                  {{$item->name}}
                </div>
              </div>
            </td>
            <td class="w-25 align-middle">
              <input type="number" class="form-control inputQty" style="width:4.5rem" min="1" value="{{ $item->qty }}" data-product="{{$loop->iteration}}">
              <a class="text-center" href="/carrinho/{{ $item->rowId }}/remove">Remover</a>
              <span class="d-none {{"productValue$loop->iteration"}}">R${{$item->price}}</span>
            </td>
            <td class="{{"newProductValue$loop->iteration"}} w-25 align-middle">
              R${{$item->price*$item->qty}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-lg-2 col-md-12 col-sm-12">
      <h4 class="d-flex justify-content-between align-items-center">
        <span class="">Resumo do pedido</span>
        <span class="badge badge-secondary">{{Cart::count()}}</span>
      </h4>
      <table class="table table-borderless">
        <tbody>
          <tr>
            <th>Subtotal</th>
            <td>{{Cart::subtotal()}}</td>
          </tr>
          @if(session('valorFrete') !== null && session('prazoFrete') !== null)
            <tr>
              <th>Frete (prazo de {{session('prazoFrete')}} dias)</th>
              <td>R${{session('valorFrete')}}</td>
            </tr>
          @endif
          <tr class="border-top border-dark">
            <th class="align-middle">Total</th>
            <td>
                @if(session('valorFrete') !== null)
                  <span class="d-flex">R${{Cart::total() + floatval(session('valorFrete')) }}</span>
                @else
                  <span class="d-flex">R${{Cart::total()}}</span>
                @endif
            </td>
          </tr>
          <tr>
            <td></td>
          </tr>
        </tbody>
      </table>
      @if(session('valorFrete') == null && session('prazoFrete') == null)
        <div class="input-group">
          <form action="{{ route('calcFrete') }}" method="POST">
            @csrf
            <input type="number" class="form-control" name="cep" aria-label="CEP" aria-describedby="">
            <div class="input-group-append">
              <button type="submit" class="btn btn-outline-secondary">Calcular frete</button>
            </div>
          </form>
        </div>
      @endif
      <a href="/checkout/endereco" class="btn btn-success">Fazer pedido</a>
    @endif
  </div>
</div>
@endsection

@section('scripts')
    <script>
      $(document).ready(function(){

        function totalCart() {
          var total = 0;
          $('.eachProductValue').each(function () {
            // console.log($(this).data('value'));
            total += $(this).data('value');
            
          });
          $('#totalCart').text("R$"+total.toFixed(2).replace('.',','));
        }

        totalCart();

        $('.inputQty').change(function (e) { 
          e.preventDefault();
          
          let product = $(e.target).data('product');
          var productValue = $('.productValue'+product).text().substring(2).replace(',', '.');
          let qty = $(e.target).val();
          var product_rowId = $('.product_rowId'+product).val();
          var product_id = $('.product_id').val();

          $.ajax({
            method: 'GET',
            url : "/carrinho/" + product_rowId + "/" + qty + "/" + product_id,
            beforeSend: function(){
              location.reload();
            }
          });
        });
      });
    </script>
@endsection
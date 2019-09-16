@extends('layouts.new_layout')

@section('content')
  <div class="row">
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
          <tr>
            <td class="w-50">
              <div class="media align-items-center">
                <img src="{{asset('img/capa_13.jpg')}}" class="rounded" style="height: 80px; width: 80px" alt="...">
                <div class="media-body text-break ml-2 mt-0">
                  {{$item->name}}
                </div>
              </div>
            </td>
            <td class="w-25">
              <input type="number" class="form-control w-50 inputQty" min="1" value="1" data-product="{{$loop->iteration}}">
              <a class="text-center" href="#">Remover</a>
              <span class="d-none {{"productValue$loop->iteration"}}">R${{$item->price}}</span>
            </td>
            <td class="{{"newProductValue$loop->iteration"}} w-25">
              R${{$item->price}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
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
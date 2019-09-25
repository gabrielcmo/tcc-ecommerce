@extends('layouts.new_layout')

@section('content')
    <div class="container">
        <div class="progress">
          <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
        </div><br>
        <div class="row mt-3 mb-3">
            <h3 class="ml-4">Pagamento</h3>
        </div>
        <div class="row mt-1">            
            <div class="col-lg-9">
                <form action="{{ route('create-payment') }}" method="post">
                    @csrf
                    <h4>Clique aqui para pagar com Paypal</h4><input type="image" src="https://www.paypalobjects.com/pt_BR/i/btn/btn_buynow_LG.gif" border="0" alt="PayPal - The safer, easier way to pay online!">
                </form>  
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 p-3" style="background-color: #f7f5f3">
                <h4 class="d-flex justify-content-between align-items-center">
                    <span class="">Endereço de entrega</span>
                </h4>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                          <th>Rua</th>
                          <td class="align-middle   ">{{session('userData')['address']}}, n° {{session('userData')['n']}}. {{session('userData')['bairro']}}</td>
                        </tr>
                        <tr class="">
                          <th>Cidade ({{session('userData')['cep']}})</th>
                          <td class="text-right">{{session('userData')['city']}} - {{session('userData')['state']}}</td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <h4 class="d-flex justify-content-between align-items-center">
                    <span class="">Seu pedido</span>
                    <span class="badge badge-secondary">{{Cart::count()}}</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach (Cart::content() as $item)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $item->name }}</h6>
                                <small class="text-muted">{{ $item->description }}</small>
                            </div>
                            <span class="text-muted">{{ $item->qty }} x R${{ $item->price }}</span>
                        </li>
                    @endforeach
                </ul>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                          <th>Subtotal</th>
                          <td id="totalCart" class="text-right">R$ {{Cart::subtotal()}}</td>
                        </tr>
                        <tr id="dadosFrete">
                          <th id="prazoFrete">Frete <span class="">(prazo de {{session('prazoFrete')}} dias)</span></th>
                          <td id="valorFrete" class="text-right">R$ {{session('valorFrete')}}</td>
                        </tr>
                        <tr class="border-top">
                          <th class="align-middle">Total</th>
                          <td id="valorTotalCompra" class="text-right w-50"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let valorSemFrete = "<?php echo Cart::subtotal() ?>";
        let totalComFrete = parseFloat(parseFloat(valorSemFrete) + parseFloat("<?php echo session('valorFrete') ?>".toString().replace(',','.'))).toFixed(2);
        $('#valorTotalCompra').text('R$ ' + totalComFrete.toString().replace('.',','));
        console.log(valorSemFrete);
        console.log(totalComFrete);
    </script>
@endsection
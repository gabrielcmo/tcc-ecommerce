@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="progress mt-4">
        <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
            aria-valuemax="100">60%</div>
    </div>
    <div class="row mt-3 mb-3">
        <h3 class="ml-4">Formas de pagamento</h3>
    </div>
    <div class="row mt-1">
        <div class="col-lg-8 col-md-12 col-sm-12 row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('create-payment') }}" method="post">
                            @csrf
                            <input type="image" class="d-flex mx-auto"
                                src="{{asset('/img/PayPal_btn.png')}}" width="40%" border="0"
                                alt="PayPal - The safer, easier way to pay online!">
                        </form>
                    </div>
                    <div class="card-body">
                        <h5 class="text-center">O PayPal é rápido, simples e seguro.</h5>
                        <p class="text-center">
                            Com o PayPal, você finaliza sua compra em poucos cliques. Informe seu e-mail, sua senha, cofirme os dados do seu pagamento e pronto!
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 p-3" style="background-color: #f7f5f3">
            <h4 class="d-flex justify-content-between align-items-center">
                <span class="">Endereço de entrega</span>
            </h4>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>Rua</th>
                        <td class="text-right">{{session('userData')['address']}}, n° {{session('userData')['n']}}.
                            {{session('userData')['bairro']}}</td>
                    </tr>
                    <tr class="">
                        <th>Cidade ({{session('userData')['cep']}})</th>
                        <td class="text-right">{{session('userData')['city']}} - {{session('userData')['state']}}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <button class="mdc-button mdc-button--raised general-button w-100" data-toggle="modal" data-target="#itensModal">
                <span class="mdc-button__label">Revisar pedido</span>
            </button>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>Subtotal</th>
                        <td id="totalCart" class="text-right">R$ {{Cart::subtotal()}}</td>
                    </tr>
                    <tr id="dadosFrete">
                        <th id="prazoFrete">Frete <span class="">(prazo de {{session('prazoFrete')}} dias)</span></th>
                        <td id="valorFrete" class="text-right" data-frete="{{session('valorFrete')}}">R$
                            {{session('valorFrete')}}</td>
                    </tr>
                    @if(session('cupom') !== null)
                        <tr class="text-success" id="cupomTr" style="">
                            <th>Cupom <small id="cupomText">({{session('cupom')['name']}})</small></th>
                            <td class="text-success text-right font-weight-bold"><div id="totalDesconto">-{{session('cupom')['desconto']}}%</div></td>
                        </tr>
                    @endif
                    <tr class="border-top">
                        <th class="align-middle">Total</th>
                        @if(session('cupom') !== null)
                            <td id="valorTotalCompra" class="text-right w-50">R$ 
                                @php
                                    echo str_replace('.',',', round((1 - (session('cupom')['desconto'] / 100)) * Cart::total(), 2) + str_replace(',','.', session('valorFrete')));     
                                @endphp
                            </td>
                        @else
                            <td id="valorTotalCompra" class="text-right w-50">R$ 
                                @php
                                    echo str_replace('.',',', Cart::subtotal() + str_replace(',','.', session('valorFrete')));     
                                @endphp
                            </td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="itensModal" tabindex="-1" role="dialog" aria-labelledby="ModalCarrinho" aria-hidden="true"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="ModalCarrinho">Carrinho</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mt-1">

                    <div class="col-12">

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
                                            <img src="/img/products/{{$img[0]->filename}}" )}}" class="rounded"
                                                style="height: 4.5rem; width: 4.5rem" alt="...">
                                            @else
                                            <img src="/img/logo_icone.png" class="rounded"
                                                style="height: 4.5rem; width: 4.5rem" alt="...">
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
                                        <span
                                            class="d-none {{"productValue$loop->iteration"}}">R${{$item->price}}</span>
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
                        <div class="d-flex">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="mdc-button mdc-button--raised bg-danger" id="botaoFecharModal" data-dismiss="modal">
                    <span class="mdc-button__label">Cancelar</span>
                </button>
                <button class="mdc-button mdc-button--raised bg-success" data-dismiss="modal" id="modalButton">
                    <span class="mdc-button__label" id="modalButtonLabel">Alterar</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/customJs/paymentCheckout.js')}}"></script>
@endsection
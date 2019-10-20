@extends('layouts.layout')

@section('title', 'Pedidos')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="col-12">Seus pedidos</h2>
                    <div id="collapseOne" class="collapse show w-100" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            @if(count($orders) == 0 && count($historics) == 0)
                                <h2>Você ainda não tem nenhum pedido! <a href="{{ route('landing') }}">Clique aqui para ir até a página inicial</a></h2>
                            @else
                                @if (count($orders) > 0)
                                    @foreach ($orders as $key => $order)
                                            <div id="accordion" class="w-100 mb-2">
                                                <div class="card">
                                                    <div class="card-header" id="products">
                                                        <button class="btn btn-link text-decoration-none text-dark" data-toggle="collapse" data-target="#productsCollapse{{$key}}" aria-expanded="false" aria-controls="collapseOne">
                                                            <h5 class="mb-0">
                                                                <div class="font-weight-bolder text-left">Pedido {{ $order->id }} &nbsp;<i class="fas fa-angle-double-down"></i></div>
                                                            </h5>
                                                            <div class="card-body">
                                                                <div class="d-flex">
                                                                    <div class="ml-2 mr-5"><strong>Situação:</strong> {{ $order->status->name }}</div>
                                                                    <div class="ml-2 mr-5"><strong>Método de pagamento: </strong> {{ $order->payment_method->name }}</div>
                                                                    <div class="ml-5 mr-2">Frete R$ {{$order->frete}} <span>Prazo de {{$order->prazo}} dias</span></div>
                                                                    <div class="ml-5 mr-5"><strong>R$ {{ $order->value_total }}</strong></div>
                                                                    <div class="ml-2 mr-2">{{ $order->created_at }}</div>
                                                                </div>
                                                            </div>
                                                        </button>
                                                    </div>
                                                
                                                    <div id="productsCollapse{{$key}}" class="collapse" aria-labelledby="products" data-parent="#accordion">
                                                        @foreach ($order->product as $item)
                                                            <div class="card-body" width="100px">
                                                                <div class="d-flex">
                                                                    <div class="col-xl-3 justify-content-start">
                                                                        @if(isset($item->image[0]->filename))
                                                                            <img src="/img/products/{{$item->image[0]->filename}}" width="25%" id='imgProduct' alt="">
                                                                        @else
                                                                            <img src="{{asset("/img/logo_icone.png")}}" width="30%" id='imgProduct' alt="">    
                                                                        @endif
                                                                    </div>
                                                                    <h5 class="col-xl-4 card-title text-left">
                                                                        {{$item->name}}
                                                                    </h5>
                                                                    <p class="col-xl-2 card-text text-center">
                                                                        <strong>Quantidade</strong> <br> {{$item->pivot->qty}}
                                                                    </p>
                                                                    <p class="col-xl-3 card-text text-center">
                                                                        <strong>R$ {{$item->price}}</strong>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                @endif
                        </div>
                    </div>
                    <div id="collapseTwo" class="collapse show w-100" aria-labelledby="headingTwo" data-parent="#accordion">
                        @if (count($historics) > 0)
                        <div class="card-body">
                                    @foreach ($historics as $key => $historic)
                                            <div id="accordion" class="w-100">
                                                <div class="card bg-secondary text-white mb-2">
                                                    <div class="card-header" id="products">
                                                        <button class="btn btn-link text-decoration-none text-white" data-toggle="collapse" data-target="#productsHistoricCollapse{{$key}}" aria-expanded="false" aria-controls="collapseOne">
                                                            <h5 class="mb-0">
                                                                <div class="font-weight-bolder text-left">Pedido {{ $historic->order_id }} &nbsp;<i class="fas fa-angle-double-down"></i></div>
                                                            </h5>
                                                            <div class="card-body">
                                                                <div class="d-flex">
                                                                    <div class="ml-2 mr-5"><strong>Situação: </strong>{{ $historic->status->name }}</div>
                                                                    <div class="ml-2 mr-5"><strong>Método de pagamento: </strong>{{ $historic->order->payment_method->name }}</div>
                                                                    <div class="ml-5 mr-2">Frete R$ {{$order->frete}} <span>Prazo de {{$order->prazo}} dias</span></div>
                                                                    <div class="ml-5 mr-5"><strong>R$ {{ $historic->order->value_total }}</strong></div>
                                                                    <div class="ml-2 mr-2">{{ $historic->created_at }}</div>
                                                                </div>
                                                            </div>
                                                        </button>
                                                    </div>
                                                
                                                    <div id="productsHistoricCollapse{{$key}}" class="collapse" aria-labelledby="products" data-parent="#accordion">
                                                        @foreach ($historic->order->product as $item)
                                                            <div class="card-body">
                                                                <div class="d-flex">
                                                                    <div class="col-xl-3 justify-content-start">
                                                                        @if(isset($item->image[0]->filename))
                                                                            <img src="/img/products/{{$item->image[0]->filename}}" width="25%" id='imgProduct' alt="">
                                                                        @else
                                                                            <img src="{{asset("/img/logo_icone.png")}}" width="30%" id='imgProduct' alt="">    
                                                                        @endif
                                                                    </div>
                                                                    <h5 class="col-xl-4 card-title text-left">
                                                                        {{$item->name}}
                                                                    </h5>
                                                                    <p class="col-xl-2 card-text text-center">
                                                                        Quantidade <br> {{$item->pivot->qty}}
                                                                    </p>
                                                                    <p class="col-xl-3 card-text text-center">
                                                                        R$ {{$item->price}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                @endforeach
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
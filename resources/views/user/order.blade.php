@extends('layouts.new_layout')

@section('title', 'Pedidos')

@section('content')
    <div class="container">
        <div class="row">
            @if(count($orders) == 0 && count($historics) == 0)
                <h2>Você ainda não tem nenhum pedido! <a href="{{ route('landing') }}">Clique aqui para ir até a página inicial</a></h2>
            @else
                @if (count($orders) > 0)
                    @foreach ($orders as $key => $order)
                        @if (count($order->product) > 1)
                            <div id="accordion" class="w-100">
                                <div class="card">
                                    <div class="card-header" id="products">
                                        <button class="btn btn-link text-decoration-none text-dark" data-toggle="collapse" data-target="#productsCollapse{{$key}}" aria-expanded="false" aria-controls="collapseOne">
                                            <h5 class="mb-0">
                                                <div class="font-weight-bolder text-left">Pedido {{ $order->id }} &nbsp;<i class="fas fa-angle-double-down"></i></div>
                                            </h5>
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="ml-5 mr-5">{{ $order->status->name }}</div>
                                                    <div class="ml-5 mr-5">{{ $order->payment_method->name }}</div>
                                                    <div class="ml-5 mr-5">Frete R$20.99 <span>Prazo 2 dias</span></div>
                                                    <div class="ml-5 mr-5">Total R${{ $order->value_total }}</div>
                                                    <div class="ml-5 mr-5">{{ $order->created_at }}</div>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                
                                    <div id="productsCollapse{{$key}}" class="collapse show" aria-labelledby="products" data-parent="#accordion">
                                        @foreach ($order->product as $item)
                                            <div class="card-body" width="100px">
                                                <div class="d-flex">
                                                    <div class="col-xl-3 justify-content-start">
                                                        @if(isset($item->image[0]->filename))
                                                            <img src="/img/products/{{$item->image[0]->filename}}" id='imgProduct' alt="">
                                                        @endif
                                                    </div>
                                                    <h5 class="col-xl-4 card-title text-left">
                                                        {{$item->name}}
                                                    </h5>
                                                    <p class="col-xl-1 card-text text-center">
                                                        {{$item->pivot->qty}}
                                                    </p>
                                                    <p class="col-xl-4 card-text text-center">
                                                        R${{$item->price}}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card w-100">
                                <div class="card-header" id="products">
                                    <h5 class="mb-0"> 
                                        <div class="font-weight-bolder text-left">Pedido {{ $order->id }}</div>
                                    </h5>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            @foreach ($order->product as $item)
                                                <div class="d-flex">
                                                    <div class="col-xl-3 justify-content-start">
                                                        @if(isset($item->image[0]->filename))
                                                            <img src="/img/products/{{$item->image[0]->filename}}" id='imgProduct' alt="">
                                                        @endif
                                                    </div>
                                                    <h5 class="col-xl-4 card-title text-left">
                                                        {{$item->name}}
                                                    </h5>
                                                    <p class="col-xl-1 card-text text-center">
                                                        {{$item->pivot->qty}}
                                                    </p>
                                                    <p class="col-xl-4 card-text text-center">
                                                        R${{$item->price}}
                                                    </p>
                                                </div>
                                            @endforeach
                                            <div class="ml-5 mr-5">{{ $order->status->name }}</div>
                                            <div class="ml-5 mr-5">Frete R$20.99 <span>Prazo 2 dias</span></div>
                                            <div class="ml-5 mr-5">Total R${{ $order->value_total }}</div>
                                            <div class="ml-5 mr-5">{{ $order->created_at }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                @if (count($historics) > 0)
                    @foreach ($historics as $key => $historic)
                        @if (count($historic->order->product) > 1)
                            <div id="accordion" class="w-100">
                                <div class="card bg-secondary text-white">
                                    <div class="card-header" id="products">
                                        <button class="btn btn-link text-decoration-none text-white" data-toggle="collapse" data-target="#productsHistoricCollapse{{$key}}" aria-expanded="false" aria-controls="collapseOne">
                                            <h5 class="mb-0">
                                                <div class="font-weight-bolder text-left">Pedido {{ $historic->order_id }} &nbsp;<i class="fas fa-angle-double-down"></i></div>
                                            </h5>
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="ml-5 mr-5">{{ $historic->status->name }}</div>
                                                    <div class="ml-5 mr-5">{{ $historic->order->payment_method->name }}</div>
                                                    <div class="ml-5 mr-5">Frete R$20.99 <span>Prazo 2 dias</span></div>
                                                    <div class="ml-5 mr-5">Total R${{ $historic->order->value_total }}</div>
                                                    <div class="ml-5 mr-5">{{ $historic->created_at }}</div>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                
                                    <div id="productsHistoricCollapse{{$key}}" class="collapse show" aria-labelledby="products" data-parent="#accordion">
                                        @foreach ($historic->order->product as $item)
                                            <div class="card-body" width="100px">
                                                <div class="d-flex">
                                                    <div class="col-xl-3 justify-content-start">
                                                        @if(isset($item->image[0]->filename))
                                                            <img src="/img/products/{{$item->image[0]->filename}}" id='imgProduct' alt="">
                                                        @endif
                                                    </div>
                                                    <h5 class="col-xl-4 card-title text-left">
                                                        {{$item->name}}
                                                    </h5>
                                                    <p class="col-xl-1 card-text text-center">
                                                        {{$item->pivot->qty}}
                                                    </p>
                                                    <p class="col-xl-4 card-text text-center">
                                                        R${{$item->price}}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card bg-secondary text-white w-100">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <div class="font-weight-bolder text-left">Pedido {{ $historic->order_id }}</div>
                                    </h5>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            @foreach ($historic->order->product as $item)
                                                <div class="d-flex">
                                                    <div class="col-xl-3 justify-content-start">
                                                        @if(isset($item->image[0]->filename))
                                                            <img src="/img/products/{{$item->image[0]->filename}}" id='imgProduct' alt="">
                                                        @endif
                                                    </div>
                                                    <h5 class="col-xl-4 card-title text-left">
                                                        {{$item->name}}
                                                    </h5>
                                                    <p class="col-xl-1 card-text text-center">
                                                        {{$item->pivot->qty}}
                                                    </p>
                                                    <p class="col-xl-4 card-text text-center">
                                                        R${{$item->price}}
                                                    </p>
                                                </div>
                                            @endforeach
                                            <div class="ml-5 mr-5">{{ $historic->status->name }}</div>
                                            <div class="ml-5 mr-5">{{ $historic->order->payment_method->name }}</div>
                                            <div class="ml-5 mr-5">Frete R$20.99 <span>Prazo 2 dias</span></div>
                                            <div class="ml-5 mr-5">Total R${{ $historic->order->value_total  }}</div>
                                            <div class="ml-5 mr-5">{{ $historic->created_at }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endif
        </div>
    </div>
@endsection
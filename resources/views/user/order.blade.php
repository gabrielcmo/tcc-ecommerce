@extends('layouts.new_layout')

@section('title', 'Pedidos')

@section('content')
    <div class="container">
        <div class="row">
            @if (count($orders) == 0)
                <div class="col-md-9">
                    <h3>Você ainda não tem nenhum pedido em andamento!</h3>
                </div>
            @else
                @foreach ($orders as $order)
                    @if (count($order->product) > 1)
                        <div id="accordion" class="w-100">
                                <div class="card">
                                    <div class="card-header" id="products">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link text-decoration-none text-dark" data-toggle="collapse" data-target="#productsCollapse" aria-expanded="true" aria-controls="collapseOne">
                                                    <div class="d-flex">
                                                        <div class="ml-2 mr-5 font-weight-bolder">Pedido {{ $order->id }}</div>
                                                        <div class="ml-5 mr-5">{{ $order->status->name }}</div>
                                                        <div class="ml-5 mr-5">{{ $order->payment_method->name }}</div>
                                                        <div class="ml-5 mr-5">Frete R$20.99</div>
                                                        <div class="ml-5 mr-5">Prazo 2 dias</div>
                                                        <div class="ml-5 mr-5">Total R${{ $order->value_total }}</div>
                                                        <div class="ml-5 mr-5">{{ $order->created_at }}</div>
                                                    </div>
                                            </button>
                                        </h5>
                                    </div>
                                
                                    <div id="productsCollapse" class="collapse show" aria-labelledby="products" data-parent="#accordion">
                                        @foreach ($order->product as $item)
                                            <div class="card-body" width="100px">
                                                <div class="d-flex">
                                                    <div class="col-xl-3 justify-content-start">
                                                        <img src="/img/products/{{$item->image[0]->filename}}" width="80px" alt="">
                                                    </div>
                                                    <h5 class="col-xl-4 card-title text-left">
                                                        {{$item->name}}
                                                    </h5>
                                                    <p class="col-xl-2 card-text text-center">
                                                        {{$item->pivot->qty}}
                                                    </p>
                                                    <p class="col-xl-3 card-text text-center">
                                                        R${{$item->price}}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                        </div>
                    @else
                    <div class="card">
                            <div class="card-header" id="products">
                                <h5 class="mb-0">
                                    <button class="btn btn-link text-decoration-none text-dark" data-toggle="collapse" data-target="#productsCollapse" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="d-flex">
                                                <div class="ml-2 mr-5 font-weight-bolder">Pedido {{ $order->id }}</div>
                                                @foreach ($order->product as $item)
                                                    <div class="d-flex">
                                                        <div class="col-xl-3 justify-content-start">
                                                            <img src="/img/products/{{$item->image[0]->filename}}" width="80px" alt="">
                                                        </div>
                                                        <h5 class="col-xl-4 card-title text-left">
                                                            {{$item->name}}
                                                        </h5>
                                                        <p class="col-xl-2 card-text text-center">
                                                            {{$item->pivot->qty}}
                                                        </p>
                                                        <p class="col-xl-3 card-text text-center">
                                                            R${{$item->price}}
                                                        </p>
                                                    </div>
                                                @endforeach
                                                <div class="ml-5 mr-5">{{ $order->status->name }}</div>
                                                <div class="ml-5 mr-5">{{ $order->payment_method->name }}</div>
                                                <div class="ml-5 mr-5">Frete R$20.99</div>
                                                <div class="ml-5 mr-5">Prazo 2 dias</div>
                                                <div class="ml-5 mr-5">Total R${{ $order->value_total }}</div>
                                                <div class="ml-5 mr-5">{{ $order->created_at }}</div>
                                            </div>
                                    </button>
                                </h5>
                            </div>
                    @endif
                @endforeach
            @endif
            @foreach ($historics as $historic)
            @if (count($historics) > 1)
            <div id="accordion" class="w-100">
                    <div class="card">
                        <div class="card-header" id="products">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-decoration-none text-dark" data-toggle="collapse" data-target="#productsCollapse" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="d-flex">
                                            <div class="ml-2 mr-5 font-weight-bolder">Pedido {{ $order->id }}</div>
                                            <div class="ml-5 mr-5">{{ $order->status->name }}</div>
                                            <div class="ml-5 mr-5">{{ $order->payment_method->name }}</div>
                                            <div class="ml-5 mr-5">Frete R$20.99</div>
                                            <div class="ml-5 mr-5">Prazo 2 dias</div>
                                            <div class="ml-5 mr-5">Total R${{ $order->value_total }}</div>
                                            <div class="ml-5 mr-5">{{ $order->created_at }}</div>
                                        </div>
                                </button>
                            </h5>
                        </div>
                    
                        <div id="productsCollapse" class="collapse show" aria-labelledby="products" data-parent="#accordion">
                            @foreach ($order->product as $item)
                                <div class="card-body" width="100px">
                                    <div class="d-flex">
                                        <div class="col-xl-3 justify-content-start">
                                            <img src="/img/products/{{$item->image[0]->filename}}" width="80px" alt="">
                                        </div>
                                        <h5 class="col-xl-4 card-title text-left">
                                            {{$item->name}}
                                        </h5>
                                        <p class="col-xl-2 card-text text-center">
                                            {{$item->pivot->qty}}
                                        </p>
                                        <p class="col-xl-3 card-text text-center">
                                            R${{$item->price}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
            </div>
        @else
        <div class="card">
                <div class="card-header" id="products">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-decoration-none text-dark" data-toggle="collapse" data-target="#productsCollapse" aria-expanded="true" aria-controls="collapseOne">
                                <div class="d-flex">
                                    <div class="ml-2 mr-5 font-weight-bolder">{{ $historic->id }}</div>
                                    @foreach ($order->product as $item)
                                        <div class="d-flex">
                                            <h5 class="col-xl-4 card-title text-left">
                                                {{$item->name}}
                                            </h5>
                                            <p class="col-xl-2 card-text text-center">
                                                {{$item->pivot->qty}}
                                            </p>
                                            <p class="col-xl-3 card-text text-center">
                                                R${{$item->price}}
                                            </p>
                                        </div>
                                    @endforeach
                                    <div class="ml-5 mr-5">{{ $historic->status->name }}</div>
                                    <div class="ml-5 mr-5">Total R${{ $historic->value_total }}</div>
                                    <div class="ml-5 mr-5">{{ $historic->created_at }}</div>
                                </div>
                                </button>
                            </h5>
                        </div>
                        @endif
            @endforeach
        </div>
    </div>
@endsection
@extends('layouts.new_layouts')

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
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Produto</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Status</th>
                                <th scope="col">Método de Pagamento</th>
                                <th scope="col">Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->product as $item)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->pivot->qty }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $order->status->name }}</td>
                                    <td>{{ $order->payment_method->name }}</td>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                @endforeach
            @endif
        </div>
    </div>
@endsection
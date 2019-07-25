@extends('layouts.default')

@section('title', 'Pedidos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @if (count($orders) == 0)
                    <h3>Você ainda não tem nenhum pedido em andamento!</h3>
                @else
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Produto</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Método de Pagamento</th>
                                <th scope="col">Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->payment_method->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
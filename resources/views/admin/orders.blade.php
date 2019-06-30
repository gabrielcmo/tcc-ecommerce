@extends('layouts.admin')

@section('title', 'Painel de Controle - Pedidos')

@section('content')
    <h2>Pedidos</h2>
    <br>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Produto</th>
                <th scope="col">Usuário</th>
                <th scope="col">Status</th>
                <th scope="col">Método de pagamento</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->product }}</td>
                    <td>{{ $item->user }}</td>
                    <td>{{ $item->payment_method }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a onclick='event.preventDefault();
                            if(confirm("Cancelar pedido?")){document.getElementById("cancel-order")}'>
                            <i class="fas fa-remove"></i></a>

                        <form action="{{ route('admin.order.cancel') }}" method="post">
                            @csrf

                            <input type="hidden" name="order_id" value="{{ $item->id }}">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
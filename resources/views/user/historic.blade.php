@extends('layouts.default')

@section('title', 'Historico')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @if (count($historics) == 0)
                    <h1>Seu histórico está vazio!</h1>
                @else
                    @foreach($historics as $historic)
                        <button class="btn btn-danger">Limpar histórico</button><br><br>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Pedido ID</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                    {{dd($historic->order)}}
                                @foreach($historic->order as $order)
                                    <tr>
                                        <td>{{ $historic->id }}</td>
                                        <td>{{ $order->id }}</td>
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
    </div>
@endsection
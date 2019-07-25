@extends('layouts.default')

@section('title', 'Historico')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @if (count($historic) == 0)
                    <h1>Seu histórico está vazio!</h1>
                @else
                    <button class="btn btn-danger">Limpar histórico</button><br><br>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Produto</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Status</th>
                                <th scope="col">Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($historic as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->status->name }}</td>
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
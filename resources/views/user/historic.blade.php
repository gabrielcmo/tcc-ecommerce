@extends('layouts.default')

@section('title', 'Historico')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <a class="btn btn-danger" href="/historico/{{ Auth::user()->id }}/clean">Limpar histórico</a><br><br>
                @if (count($historics) == 0)
                    <h1>Seu histórico está vazio!</h1>
                @else
                    @foreach($historics as $historic)
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">produto</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($historic->order->product as $product)
                                    <tr>
                                        <td>{{ $historic->id }}</td>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $historic->status->name }}</td>
                                        <td>{{ $historic->created_at }}</td>
                                    </tr>
                                @endforeach
                                <br>
                            </tbody>
                        </table>
                        <br>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
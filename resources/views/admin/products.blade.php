@extends('layouts.admin')

@section('title')
    Painel de Controle - Produtos
@endsection

@section('content')
    <h2>Produtos</h2>
    <br>

    <a href="/admin/product/create" class="btn btn-info">Adicionar um produto</a>
    <br>
    <br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Quantidade em estoque</th>
                <th scope="col">Preço</th>
                <th scope="col">Categoria</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->qtd_last }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>
                        <a href="/admin/product/{{$item->id}}/edit"><i class="fas fa-pencil-alt"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a onclick='event.preventDefault();
                            if(confirm("Você tem certeza disso?")){window.location.href = "/admin/product/{{$item->id}}/destroy"}'>
                            <i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
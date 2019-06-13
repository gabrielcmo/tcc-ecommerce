@extends('layouts.admin')

@section('title')
    Painel de Controle - Editar produto
@endsection

@section('content')
    <h2>Editar produto</h2>
    <br>

    <form action="{{ route('admin.product.store') }}" method="post">
        <div class="row">
            <input type="text" class="form-control" name="name" id="" value="{{ $product->name }}">
            <input type="text" class="form-control" name="details" id="" value="{{ $product->details }}">
            <input type="text" class="form-control" name="description" id="" value="{{ $product->description }}">
            <input type="text" class="form-control" name="qtd" id="" placeholder="Quantidade para adicionar">
            <input type="text" class="form-control" name="weight" id="" value="{{ $product->weight }}">
            <input type="text" class="form-control" name="width" id="" value="{{ $product->width }}">
            <input type="text" class="form-control" name="height" id="" value="{{ $product->height }}">
            <input type="text" class="form-control" name="price" id="" value="{{ $product->price }}">
            <select name="category_id" class="form-control" id="">
                <option value="1">Cama</option>
                <option value="2">Mesa</option>
                <option value="3">Banho</option>
            </select>
            <button type="submit" class="btn btn-success">Atualizar</button>        
        </div>
    </form>
@endsection
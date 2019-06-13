@extends('layouts.admin')

@section('title')
    Painel de Controle - Editar produto
@endsection

@section('content')
    <h2>Editar produto</h2>
    <br>

    <form action="{{ route('admin.product.update') }}" method="post">
        @csrf
        <div class="row">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="form-group col-md-6">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
            </div>
            <div class="form-group col-md-6">
                <label for="details">Detalhes</label>
                <input type="text" class="form-control" name="details" id="details" value="{{ $product->details }}">
            </div>
            <div class="form-group col-md-6">
                <label for="description">Descrição</label>
                <input type="text" class="form-control" name="description" id="description" value="{{ $product->description }}">
            </div>
            <div class="form-group col-md-6">
                <label for="qtd_last">Quantidade em estoque</label>
                <input type="number" class="form-control" name="qtd_last" id="qtd_last" value="{{ $product->qtd_last }}">
            </div>
            <div class="form-group col-md-6">
                <label for="weight">Peso</label>
                <input type="number" class="form-control" name="weight" id="weight" value="{{ $product->weight }}">
            </div>
            <div class="form-group col-md-6">
                    <label for="width">Comprimento</label>
                <input type="number" class="form-control" name="width" id="width" value="{{ $product->width }}">
            </div>
            <div class="form-group col-md-6">
                <label for="height">Altura</label>
                <input type="number" class="form-control" name="height" id="height" value="{{ $product->height }}">
            </div>
            <div class="form-group col-md-6">
                <label for="price">Preço</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}">
            </div>
            <div class="form-group col-md-6">
                <label for="category">Categoria</label>
                <select name="category_id" class="form-control" id="category">
                    <option value="">Selecione uma categoria</option>
                    @if($product->category_id == 1)
                        <option selected value="1">Cama</option>
                        <option value="2">Mesa</option>
                        <option value="3">Banho</option>
                    @elseif($product->category_id == 2)
                        <option value="1">Cama</option>
                        <option selected value="2">Mesa</option>
                        <option value="3">Banho</option>
                    @else
                        <option value="1">Cama</option>
                        <option value="2">Mesa</option>
                        <option selected value="3">Banho</option>
                    @endif
                </select>
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
        </div>
    </form>
@endsection
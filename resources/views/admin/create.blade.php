@extends('layouts.admin')

@section('title', 'Painel de Controle - Criar produto')

@section('content')
    <h2>Criar produto</h2>
    <br>

    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <input type="file" class="form-control" name="img[]" id="img" multiple>
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="name" id="" placeholder="Nome">
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="details" id="" placeholder="Detalhes">
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="description" id="" placeholder="Descrição">
            </div>
            <div class="form-group col-md-6">
                <input type="number" class="form-control" name="qtd_last" id="" placeholder="Quantidade em estoque">
            </div>
            <div class="form-group col-md-6">
                <input type="number" class="form-control" name="weight" id="" placeholder="Peso">
            </div>
            <div class="form-group col-md-6">
                <input type="number" class="form-control" name="width" id="" placeholder="Comprimento">
            </div>
            <div class="form-group col-md-6">
                <input type="number" class="form-control" name="lenght" id="" placeholder="Largura">
            </div>
            <div class="form-group col-md-6">
                <input type="number" class="form-control" name="height" id="" placeholder="Altura">
            </div>
            <div class="form-group col-md-6">
                    <input type="number" class="form-control" name="price" id="" placeholder="Preço">
            </div>
            <div class="form-group col-md-6">
                <select name="category_id" class="form-control" id="">
                    <option value="">Selecione uma categoria</option>
                    <option value="1">Cama</option>
                    <option value="2">Mesa</option>
                    <option value="3">Banho</option>
                </select>
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-success float-right">Criar</button>
            </div>
        </div>
    </form>
@endsection
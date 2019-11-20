@extends('layouts.admin')

@section('title', 'Editar produto')

@section('content')
<div class="card text-left">
  <div class="card-body">
    <h4 class="card-title">Editar produto</h4>
    <p class="card-text">
        <form action="{{ route('admin.product.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="col-md-6">
                    @if (count($product->image) !== 0)
                        <img src="/img/products/{{$product->image[0]->filename}}" style="width:20%;" class="rounded mx-auto d-block" alt="Imagem principal">
                    @else
                        <h5 class="text-center">Sem imagens no momento</h5>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="img">Imagens</label>
                    <input type="file" class="form-control" name="img[]" id="img" multiple>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="description">Descrição</label>
                    <textarea type="text" class="form-control" name="description" id="description" required>{{ $product->description }}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="qtd_last">Quantidade em estoque</label>
                    <input type="number" class="form-control" name="qtd_last" id="qtd_last" value="{{ $product->qtd_last }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="weight">Peso</label>
                    <input type="number" class="form-control" name="weight" id="weight" value="{{ $product->weight }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="lenght">Largura</label>
                    <input type="number" class="form-control" name="lenght" id="lenght" value="{{ $product->lenght }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="width">Comprimento</label>
                    <input type="number" class="form-control" name="width" id="width" value="{{ $product->width }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="height">Altura</label>
                    <input type="number" class="form-control" name="height" id="height" value="{{ $product->height }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="price">Preço</label>
                    <input type="number" step="0.01" class="form-control" name="price" id="price" value="{{ $product->price }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="category">Selecione uma categoria</label>
                    <select name="category_id" class="form-control" id="category" required>
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
            </div>
            <button type="submit" class="btn btn-success float-right">Atualizar produto</button>
        </form>
    </p>
  </div>
</div>
@endsection
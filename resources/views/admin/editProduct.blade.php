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
                        <img src="/img/products/{{$product->image[0]->filename}}" style="width:20%;" class="rounded mx-auto d-block" alt="Produto">
                    @else
                        <h5 class="text-center">Sem imagens no momento</h5>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Imagens</label>
                    <input type="file" class="form-control" name="img[]" id="img" multiple>
                </div>
                <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ $product->name }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="descricao">Descrição</label>
                    <textarea type="text" class="form-control" name="descricao" id="descricao" value="{{ $product->description }}" required></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="qtd_restante">Quantidade em estoque</label>
                    <input type="number" class="form-control" name="qtd_restante" id="qtd_restante" value="{{ $product->qtd_last }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="peso">Peso</label>
                    <input type="number" class="form-control" name="peso" id="peso" value="{{ $product->weight }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="largura">Largura</label>
                    <input type="number" class="form-control" name="largura" id="largura" value="{{ $product->width }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="comprimento">Comprimento</label>
                    <input type="number" class="form-control" name="comprimento" id="comprimento" value="" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="altura">Altura</label>
                    <input type="number" class="form-control" name="altura" id="altura" value="{{ $product->height }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="valor">Preço</label>
                    <input type="number" class="form-control" name="valor" id="valor" value="{{ $product->price }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="categoria">Selecione uma categoria</label>
                    <select name="categoria_id" class="form-control" id="categoria" required>
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
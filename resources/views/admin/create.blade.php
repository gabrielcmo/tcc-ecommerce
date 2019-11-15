@extends('layouts.admin')

@section('title', 'Painel de Controle - Criar produto')

@section('content')
<div class="card text-left">
  <div class="card-body">
    <h4 class="card-title">Criar produto</h4>
    <p class="card-text">
        <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                  <label for="img">Imagens</label>
                  <input type="file" class="form-control" name="img[]" id="img" aria-describedby="help1" style="" multiple>
                  <small id="help1" class="text-muted">Adicione até 4 imagens para o produto</small>
                </div>
                <div class="form-group col-md-6">
                  <label for="nome">Nome</label>
                  <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="descricao">Descrição</label>
                    <textarea type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" required></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="qtd_restante">Quantidade em estoque</label>
                    <input type="number" class="form-control" name="qtd_restante" id="qtd_restante" min="1" placeholder="Quantidade em estoque" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="peso">Peso</label>
                    <input type="number" class="form-control" name="peso" id="peso" placeholder="Peso" aria-describedby="help3" required>
                    <small id="help3" class="text-muted">Adicione o peso em gramas</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="comprimento">Comprimento</label>
                    <input type="number" class="form-control" name="comprimento" id="comprimento" placeholder="Comprimento" aria-describedby="help4" required>
                    <small id="help4" class="text-muted">Adicione o comprimento em centímetros</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="largura">Largura</label>
                    <input type="number" class="form-control" name="largura" id="largura" placeholder="Largura" aria-describedby="help5" required>
                    <small id="help5" class="text-muted">Adicione a largura em centímetros</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="altura">Altura</label>
                    <input type="number" class="form-control" name="altura" id="altura" placeholder="Altura" aria-describedby="help6" required>
                    <small id="help6" class="text-muted">Adicione a altura em centímetros</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="valor">Preço (BRL)</label>
                    <input type="number" step="0.01" class="form-control" name="valor" id="valor" placeholder="20.99" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="categoria">Selecione uma categoria</label>
                    <select name="categoria_id" class="form-control" id="categoria" required>
                        <option value="1">Cama</option>
                        <option value="2">Mesa</option>
                        <option value="3">Banho</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success float-right">Criar produto</button>
        </form>
    </p>
  </div>
</div>
@endsection
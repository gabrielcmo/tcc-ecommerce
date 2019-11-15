@extends('layouts.admin')

@section('title', 'Cupom')

@section('content')
<div class="card text-left">
  <div class="card-body">
    <h4 class="card-title">Criar cupom</h4>
    <p class="card-text">
        <form action="{{ route('cupomCreateData') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="cupom">Nome</label>
              <input type="text" name="nome" id="cupom" class="form-control" placeholder="" aria-describedby="help1">
              <small id="help1" class="text-muted">Nome do cupom</small>
            </div>
            <div class="form-group">
              <label for="fornecido_por">Fornecido</label>
              <input type="text" name="fornecido_por" id="fornecido_por" class="form-control" placeholder="" aria-describedby="help2">
              <small id="help2" class="text-muted">Nome do fornecedor</small>
            </div>
            <div class="form-group">
              <label for="desconto">Desconto</label>
              <input type="text" name="desconto" id="desconto" class="form-control" placeholder="20" aria-describedby="help3">
              <small id="help3" class="text-muted">Valor de desconto em porcentagem</small>
            </div>
            <button type="submit" class="btn btn-success">Criar cupom</button>
        </form>
    </p>
  </div>
</div>
@endsection
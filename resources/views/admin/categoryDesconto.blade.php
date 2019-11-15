@extends('layouts.admin')

@section('title', 'Categoria desconto')

@section('content')
<div class="card text-left">
  <div class="card-body">
    <h4 class="card-title">Aplicar desconto a uma categoria</h4>
    <p class="card-text">
        <form action="{{ route('descontoCategoriaData') }}" method="post">
            <div class="row">
                @csrf
                <div class="form-group col-6">
                  <label for="categoria">Selecione uma categoria</label>
                  <select class="form-control" name="categoria_id" id="categoria">
                    <option value="1">Cama</option>
                    <option value="2">Mesa</option>
                    <option value="3">Banho</option>
                  </select>
                </div>
                <div class="form-group col-6">
                  <label for="desconto">Desconto</label>
                  <input type="text" name="desconto" id="desconto" class="form-control" placeholder="20" aria-describedby="help1">
                  <small id="help1" class="text-muted">Insira o valor de desconto em porcentagem</small>
                </div>
            </div>
            <input type="submit" class="btn btn-success float-right" value="Aplicar desconto">
        </form>
    </p>
  </div>
</div>
@endsection
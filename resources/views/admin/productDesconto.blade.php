@extends('layouts.admin')

@section('title', 'Produto desconto')

@section('content')
<div class="card text-left">
  <div class="card-body">
    <h4 class="card-title">Desconto no produto de ID {{ $product_id }}</h4>
    <p class="card-text">
        <form action="/admin/product/desconto/" method="post">
            @csrf
            <div class="form-group">
              <label for="desconto">Desconto</label>
              <input type="text" name="desconto" id="desconto" class="form-control" placeholder="Exemplo: 20" aria-describedby="help1">
              <small id="help1" class="text-muted">Insira o valor de desconto em porcentagem (sem o %)</small>
            </div>
            <input type="hidden" name="product_id" value="{{$product_id}}">
            <input type="submit" class="btn btn-success float-right" value="Aplicar desconto">
        </form>
    </p>
  </div>
</div>
@endsection
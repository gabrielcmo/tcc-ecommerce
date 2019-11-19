@extends('layouts.admin')

@section('title', 'Painel de Controle - Criar cupom')

@section('content')
  <div class="card text-left">
    <div class="card-body">
      <h4 class="card-title">Criar cupom</h4>
      <p class="card-text">
        <form action="{{route('admin.cupom.store')}}" method="post" id="cupomAddForm">
          @csrf
          <div class="row">
            <div class="form-group col-md-6">
              <label for="cupom-name">Nome</label>
              <input type="text" class="form-control" name="cupom_name" id="cupom-name">
            </div>
            <div class="form-group col-md-6">
              <label for="cupom-provider">Fornecido por</label>
              <input type="text" class="form-control" name="cupom_provider" id="cupom-provider">
            </div>
            <div class="form-group col-md-12">
              <label for="cupom-discount">Desconto</label>
              <input type="number" class="form-control" name="cupom_discount" id="cupom-discount" aria-describedby="help-discount">
              <small id="help-discount" class="text-muted">Insira o valor em porcentagem</small>
            </div>
            <button class="mdc-button mdc-button--raised bg-success" type="submit">
              <span class="mdc-button__label">Criar</span>
            </button>
          </div>
        </form>
      </p>
    </div>
  </div>
@endsection

@section('scripts')
<script src="{{asset('js/customJs/admin.js')}}"></script>
@endsection
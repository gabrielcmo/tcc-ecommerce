@extends('layouts.layout')

@section('title', 'Avaliar produto')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-12">
      <a class="mdc-button mdc-button--raised general-button mt-2" href="/pedidos">
        <span class="mdc-button__label"><i class="fas fa-arrow-left"></i> Voltar</span>
      </a>
      @if (count($produtos_nao_avaliados) == 0)
        <div class="card mt-2 p-2 bg-light">
          <h5 class="text-center">Você já avaliou todos os produtos presentes nessa compra!</h5>
          <h6 class="text-center">Caso queira ver os produtos que você avaliou selecione os produtos abaixo!</h6>
        </div>
      @endif
      <div class="card mt-2">
        <div class="card-header">Avaliar produtos da compra de número: {{$order_id}}</div>
        <div class="card-body">
          <form action="{{route('rating.store')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="selectProduct">Produtos</label>
              <select name="product-rating" id="selectProduct" class="form-control">
                <option selected>Escolha o produto a ser avaliado</option>
                @foreach ($produtos_nao_avaliados as $product)
                  <option value="{{$product->id}}">{{$product->nome}}</option>
                @endforeach
                @foreach ($produtos_avaliados as $product)
                    <option value="{{$product->id}}">{{$product->nome}} <small class="font-weight-light">(já avaliado)</small></option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="title">Título da avaliação</label>
              <input type="text" class="form-control" id="title" name="title-rating">
            </div>
            <div class="form-group">
              <label for="description-text">Descrição da avaliação</label>
              <textarea name="description-text" id="description-text" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="star-rate">Nota</label>
              <div id="star-rate" class="d-flex">
                <i class="material-icons stars-rating star-1" style="font-size: 2.5rem">star</i>
                <i class="material-icons stars-rating star-2" style="font-size: 2.5rem">star</i>
                <i class="material-icons stars-rating star-3" style="font-size: 2.5rem">star</i>
                <i class="material-icons stars-rating star-4" style="font-size: 2.5rem">star</i>
                <i class="material-icons stars-rating star-5" style="font-size: 2.5rem">star</i>
              </div>
              <input type="hidden" name="note-rating" id="note-rating">
              <input type="hidden" name="order-id" value="{{ $order_id }}" id="order-id">
            </div>
            <button class="mdc-button mdc-button--raised general-button" type="submit">
              <span class="mdc-button__label">Avaliar</span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/customJs/rating.js')}}"></script>
@endsection
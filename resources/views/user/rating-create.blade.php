@extends('layouts.layout')

@section('title', 'Avaliar produtos')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-12">

      @if (count($products) == 0)
        <div class="card mt-2 p-2 bg-light">
          <h5 class="text-center">Todos os produtos que você comprou já foram avaliados ou então não há nenhum pedido que lhe foi entregue!</h5>
          <h6 class="text-center">Caso queira ver os produtos que você avaliou ou seus pedidos escolha um dos botões abaixo!</h6>
          <div class="d-flex">
            <button class="mdc-button mdc-button--raised general-button w-50 mr-1 actionButton" data-href="{{route('rating.index')}}">
              <span class="mdc-button__label">Ver avaliações</span>
            </button>
            <button class="mdc-button mdc-button--raised general-button w-50 actionButton" data-href="{{route('orders')}}">
              <span class="mdc-button__label">Ver pedidos</span>
            </button>
          </div>
        </div>
      @else
        <div class="card mt-2">
          <div class="card-header">Avaliar produtos entregues</div>
          <div class="card-body">
            <form action="{{route('rating.store')}}" method="POST" id="ratingForm">
              @csrf

              <div class="form-group">
                <label for="selectProduct">Produtos</label>
                <select name="product_id" id="selectProduct" class="form-control">
                  <option selected value="">Escolha o produto a ser avaliado</option>
                  @foreach ($products as $product)
                    <option value="{{$product['product_id']}}">{{$product['product_name']}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="title">Título da avaliação</label>
                <input type="text" class="form-control" id="title" name="title_rating">
              </div>
              <div class="form-group">
                <label for="description-text">Descrição da avaliação</label>
                <textarea name="description_text" id="description-text" rows="5" class="form-control"></textarea>
              </div>

              <div class="form-group">
                <label for="star-rate">Nota <span></span></label>
                <div id="star-rate" class="d-flex">
                  <i class="material-icons stars-rating star-1" style="font-size: 2.5rem">star</i>
                  <i class="material-icons stars-rating star-2" style="font-size: 2.5rem">star</i>
                  <i class="material-icons stars-rating star-3" style="font-size: 2.5rem">star</i>
                  <i class="material-icons stars-rating star-4" style="font-size: 2.5rem">star</i>
                  <i class="material-icons stars-rating star-5" style="font-size: 2.5rem">star</i>
                </div>
                <input type="hidden" name="note_rating" id="note-rating" required>
              </div>
              
              <button class="mdc-button mdc-button--raised general-button" type="submit">
                <span class="mdc-button__label">Avaliar</span>
              </button>
            </form>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/customJs/ratingCreate.js')}}"></script>
@endsection
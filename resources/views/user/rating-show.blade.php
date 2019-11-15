@extends('layouts.layout')

@section('title', 'Avaliar produto')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-12">
        <a class="mdc-button mdc-button--raised general-button mt-2" href="{{ URL::previous() }}">
          <span class="mdc-button__label"><i class="fas fa-arrow-left"></i> Voltar</span>
        </a>
        <div class="card mt-2">
            <div class="card-header">Suas avaliações da compra de número: {{ $order_id }}</div>
            <div class="card-body">
                <div class="row">
                    @foreach ($ratings as $rating)
                        <div class="card col-6" style="border:none;">
                            @if (count($rating->product->image) !== 0)
                                <img src="/img/products/{{ $rating->product->image[0]->filename}}" style="width:150px;" class="rounded mx-auto d-block" alt="Produto">
                            @else
                                <img src="/img/doomus_logo.png" style="width:150px;" class="rounded mx-auto d-block" alt="Produto">
                            @endif
                            <div class="card-body">
                                <h4 class="card-title">{{ $rating->product->nome}}</h4>
                                <p class="card-text">
                                    <p class="font-weight-bolder">Título da avaliação: <span class="font-weight-light">{{$rating->title}}</span></p>
                                    <p class="font-weight-bolder">Descrição da avaliação: <span class="font-weight-light">{{$rating->text}}</span></p>
                                    <p class="font-weight-bolder">Nota: <span class="font-weight-light">{{$rating->note}}</span></p>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/customJs/rating.js')}}"></script>
@endsection
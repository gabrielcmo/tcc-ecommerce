@extends('layouts.layout')

@section('title', 'Minhas avaliações')

@section('content')
<div class="container">
  @if (count($ratings) == 0)
    <div class="row justify-content-center">
      <div class="card p-2 bg-light">
        <h5 class="text-center">Você ainda não realizou nenhuma avaliação!</h5>
        <h6 class="text-center">Para avaliar os produtos que você comprou clique no botão abaixo!</h6>
        <button class="mdc-button mdc-button--raised general-button actionButton" data-href="{{route('rating.create')}}">
          <span class="mdc-button__label">Avaliar produtos</span>
        </button>
      </div>
    </div>
  @else
    <div class="row mt-3">
      <h4 class="ml-2">Minhas avaliações
        <button class="mdc-button mdc-button--raised general-button actionButton" data-href="{{route('rating.create')}}">
          <span class="mdc-button__label">Avaliar produtos</span>
        </button>
      </h4>
    </div>
    <div class="row mt-2">
      <table class="table table-borderless">
        <thead>
          <tr>
            <th>Produtos</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($ratings as $rating)
            <tr>
              <td class="rating{{$loop->iteration}}-accordion">
                <div class="w-100 ratings-accordions" id="rating{{$loop->iteration}}-accordion" data-rating="{{$loop->iteration}}">
                  <div class="card">
                    <div class="card-header ratings-accordions-header" id="rating{{$loop->iteration}}-accordion-header">
                      <h5 class="d-flex justify-content-between align-items-center mb-0">
                        <span class="">{{$rating->product->name}}</span>
                      </h5>
                    </div>
                    <div id="rating{{$loop->iteration}}-accordion-collapse" class="collapse" aria-labelledby="rating{{$loop->iteration}}-accordion-header" data-parent="#rating{{$loop->iteration}}-accordion">
                      <div class="card-body">
                        <p class="font-weight-bolder">Título da avaliação: <span class="font-weight-light text-break">{{$rating->title}}</span></p>
                        <p class="font-weight-bolder">Descrição: <span class="font-weight-light text-break">{{$rating->text}}</span></p>
                        <p class="font-weight-bolder mb-0">Nota: </p>
                        <p class="mt-0">
                          @switch($rating->note)
                              @case(1)
                                <i class="material-icons" style="font-size: 2rem; color: gold;">star</i>
                                <i class="material-icons" style="font-size: 2rem">star</i>
                                <i class="material-icons" style="font-size: 2rem">star</i>
                                <i class="material-icons" style="font-size: 2rem">star</i>
                                <i class="material-icons" style="font-size: 2rem">star</i>
                                  @break
                              @case(2)
                                <i class="material-icons" style="font-size: 2rem; color: gold;">star</i>
                                <i class="material-icons" style="font-size: 2rem; color: gold;">star</i>
                                <i class="material-icons" style="font-size: 2rem">star</i>
                                <i class="material-icons" style="font-size: 2rem">star</i>
                                <i class="material-icons" style="font-size: 2rem">star</i>
                                  @break
                              @case(3)
                                <i class="material-icons" style="font-size: 2rem; color: gold;">star</i>
                                <i class="material-icons" style="font-size: 2rem; color: gold;">star</i>
                                <i class="material-icons" style="font-size: 2rem; color: gold;">star</i>
                                <i class="material-icons" style="font-size: 2rem">star</i>
                                <i class="material-icons" style="font-size: 2rem">star</i>
                                  @break
                              @case(4)
                                <i class="material-icons" style="font-size: 2rem; color: gold;">star</i>
                                <i class="material-icons" style="font-size: 2rem; color: gold;">star</i>
                                <i class="material-icons" style="font-size: 2rem; color: gold;">star</i>
                                <i class="material-icons" style="font-size: 2rem; color: gold;">star</i>
                                <i class="material-icons" style="font-size: 2rem">star</i>
                                  @break
                              @case(5)
                                <i class="material-icons" style="font-size: 2rem; color: gold;">star</i>
                                <i class="material-icons" style="font-size: 2rem; color: gold;">star</i>
                                <i class="material-icons" style="font-size: 2rem; color: gold;">star</i>
                                <i class="material-icons" style="font-size: 2rem; color: gold;">star</i>
                                <i class="material-icons" style="font-size: 2rem; color: gold;">star</i>
                                  @break
                              @default
                          @endswitch
                        </p>
                        <div class="d-flex justify-content-between">
                          <button class="mdc-button mdc-button--raised general-button actionButton" data-href="{{route('rating.edit',['rating_id'=>$rating->id])}}">
                            <span class="mdc-button__label">Alterar avaliação</span>
                          </button>
                          <button class="mdc-button mdc-button--raised bg-danger actionButton" data-href="{{route('rating.destroy', ['rating_id'=>$rating->id])}}">
                            <span class="mdc-button__label">Excluir avaliação</span>
                          </button>  
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
</div>
@endsection

@section('scripts')
<script src="{{asset('js/customJs/ratingIndex.js')}}"></script>
@endsection
@extends('layouts.layout')

@section('title', 'Histórico de compra')

@section('content')
<div class="container">
  @if (count($historics) !== 0)
    <div class="row justify-content-center">
      <div class="card p-2 bg-light">
        <h5 class="text-center">Você não possui nenhum pedido ainda!</h5>
        <h6 class="text-center">Para ver nossa lista de produtos clique no botão abaixo</h6>
        <button class="mdc-button mdc-button--raised general-button actionButton" data-href="{{route('landing')}}">
          <span class="mdc-button__label">Voltar</span>
        </button>
      </div>
    </div>
  @else
    <div class="row mt-3">
      <h4 class="ml-2">Histórico de compras</h4>
    </div>
    <div class="row mt-2">
      <table class="table table-borderless">
        <thead>
          <tr>
            <th>Pedidos</th>
          </tr>
        </thead>
        <tbody>
          {{-- @foreach ($historics as $pedido) --}}
            <tr>
              <td>
                <div class="w-100 pedidos-accordions" id="pedido-accordion" data-pedido="">
                  <div class="card">
                    <div class="card-header" id="pedido-accordion-header">
                      <h5 class="d-flex justify-content-between align-items-center mb-0">
                        <span class="">Número do pedido: <span class="text-weight-bold"></span></span>
                        <span class="">Status: <span class="text-success">Confirmado</span></span>
                      </h5>
                    </div>
                    <div id="pedido-accordion-collapse" class="collapse" aria-labelledby="pedido-accordion-header" data-parent="#pedido-accordion">
                      <div class="card-body">
                        <div>
                          <h6 class="d-flex justify-content-between">
                            <span>Pedido de número:</span>
                            <span>Realizado no dia:</span>
                          </h6>
                          <h6></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  
              </td>  
            </tr>    
          {{-- @endforeach --}}
        </tbody>
      </table>
    </div>
  @endif
</div>
@endsection

@section('scripts')
  <script src="{{asset('js/customJs/order.js')}}"></script>
@endsection
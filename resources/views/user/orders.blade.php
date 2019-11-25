@extends('layouts.layout')

@section('title', 'Histórico de compra')

@section('stylesheets')
    <link rel="stylesheet" href="/css/ratingStar.css">
@endsection

@section('content')
<div class="container">
  @if (count($orders) == 0)
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
          @foreach ($orders as $pedido)
            <tr>
              <td class="pedido{{$loop->iteration}}-accordion">
                <div class="w-100 pedidos-accordions" id="pedido{{$loop->iteration}}-accordion" data-pedido="{{$loop->iteration}}">
                  <div class="card">
                    <div class="card-header pedidos-accordions-header" id="pedido{{$loop->iteration}}-accordion-header">
                      <h5 class="d-flex justify-content-between align-items-center mb-0">
                        <span class="">Número do pedido: <span class="text-weight-bold">{{$pedido->id}}</span></span>
                        <span class="text-right">Status: 
                          @switch($pedido->status_id)
                              @case(1)
                                <span class="text-warning">Processando pagamento</span>
                                  @break
                              @case(2)
                                <span class="text-success">Pagamento autorizado</span>
                                  @break
                              @case(3)
                                <span class="text-warning">Em transporte</span>
                                  @break
                              @case(4)
                                <span class="text-success">Entregue</span>
                                  @break
                              @case(5)
                                <span class="text-danger">Cancelado</span>
                                  @break
                              @default    
                          @endswitch
                        </span>
                      </h5>
                    </div>
                    <div id="pedido{{$loop->iteration}}-accordion-collapse" class="collapse" aria-labelledby="pedido{{$loop->iteration}}-accordion-header" data-parent="#pedido{{$loop->iteration}}-accordion">
                      <div class="card-body">
                        <div>
                          <h4 class="d-flex justify-content-between">
                            <span>Pedido de número: {{$pedido->id}}</span>
                            <span>Realizado no dia: 
                              <span class="font-weight-light">
                                @php
                                if (!is_null($pedido->data_realizado)) {
                                  $data_realizado = DateTime::createFromFormat('Y-m-d H:i:s', $pedido->data_realizado);
                                  echo $data_realizado->format('d/m/Y H:i:s');
                                }
                                @endphp
                              </span>
                            </span>
                          </h4>
                          <div class="progress mt-2">
                            @switch($pedido->status_id)
                                @case(1)
                                  <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    @break
                                @case(2)
                                  <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                    @break
                                @case(3)
                                  <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div> 
                                    @break
                                @case(4)
                                  <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                    @break
                                @case(5)
                                  <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                    @break
                                @default
                                    
                            @endswitch
                          </div>
                          <div class="d-flex flex-row justify-content-between">
                            @switch($pedido->status_id)
                                @case(1)
                                  <div class="badge text-wrap text-warning" style="width: 10rem">
                                    <p class="mb-0">Processando pagamento</p>
                                    <p class="mb-0 mt-1">{{$data_realizado->format('d/m/Y H:i:s')}}</p>
                                  </div>
                                  <div class="badge text-wrap text-muted" style="width: 10rem">
                                    <p class="mb-0">Pagamento autorizado</p>
                                    <p class="mb-0 mt-1"></p>
                                  </div>
                                  <div class="badge text-wrap text-muted" style="width: 10rem">
                                    <p class="mb-0">Em transporte</p>
                                    <p class="mb-0 mt-1"></p>
                                  </div>
                                  <div class="badge text-wrap text-muted" style="width: 10rem">
                                    <p class="mb-0">Entregue</p>
                                    <p class="mb-0 mt-1"></p>
                                  </div>
                                    @break
                                @case(2)
                                  <div class="badge text-wrap text-success" style="width: 10rem">
                                    <p class="mb-0">Processando pagamento</p>
                                    <p class="mb-0 mt-1">{{$data_realizado->format('d/m/Y H:i:s')}}</p>
                                  </div>
                                  <div class="badge text-wrap text-warning" style="width: 10rem">
                                    <p class="mb-0">Pagamento autorizado</p>
                                    <p class="mb-0 mt-1">
                                      @php
                                        if (!is_null($pedido->data_aprovado)) {
                                          $data_aprovado = DateTime::createFromFormat('Y-m-d H:i:s', $pedido->data_aprovado);
                                          echo $data_aprovado->format('d/m/Y H:i:s');
                                        }    
                                      @endphp
                                    </p>
                                  </div>
                                  <div class="badge text-wrap text-muted" style="width: 10rem">
                                    <p class="mb-0">Em transporte</p>
                                    <p class="mb-0 mt-1"></p>
                                  </div>
                                  <div class="badge text-wrap text-muted" style="width: 10rem">
                                    <p class="mb-0">Entregue</p>
                                    <p class="mb-0 mt-1"></p>
                                  </div>
                                    @break
                                @case(3)
                                  <div class="badge text-wrap text-success" style="width: 10rem">
                                    <p class="mb-0">Processando pagamento</p>
                                    <p class="mb-0 mt-1">{{$data_realizado->format('d/m/Y H:i:s')}}</p>
                                  </div>
                                  <div class="badge text-wrap text-success" style="width: 10rem">
                                    <p class="mb-0">Pagamento autorizado</p>
                                    <p class="mb-0 mt-1">
                                      @php
                                        if (!is_null($pedido->data_aprovado)) {
                                          $data_aprovado = DateTime::createFromFormat('Y-m-d H:i:s', $pedido->data_aprovado);
                                          echo $data_aprovado->format('d/m/Y H:i:s');
                                        }    
                                      @endphp
                                    </p>
                                  </div>
                                  <div class="badge text-wrap text-warning" style="width: 10rem">
                                    <p class="mb-0">Em transporte</p>
                                    <p class="mb-0 mt-1">
                                      @php
                                        if (!is_null($pedido->data_despache)) {
                                          $data_despache = DateTime::createFromFormat('Y-m-d H:i:s', $pedido->data_despache);
                                          echo $data_despache->format('d/m/Y H:i:s');
                                        }    
                                      @endphp
                                    </p>
                                  </div>
                                  <div class="badge text-wrap text-muted" style="width: 10rem">
                                    <p class="mb-0">Entregue</p>
                                    <p class="mb-0 mt-1"></p>
                                  </div>
                                    @break
                                @case(4)
                                  <div class="badge text-wrap text-success" style="width: 10rem">
                                    <p class="mb-0">Processando pagamento</p>
                                    <p class="mb-0 mt-1">{{$data_realizado->format('d/m/Y H:i:s')}}</p>
                                  </div>
                                  <div class="badge text-wrap text-success" style="width: 10rem">
                                    <p class="mb-0">Pagamento autorizado</p>
                                    <p class="mb-0 mt-1">
                                      @php
                                        if (!is_null($pedido->data_aprovado)) {
                                          $data_aprovado = DateTime::createFromFormat('Y-m-d H:i:s', $pedido->data_aprovado);
                                          echo $data_aprovado->format('d/m/Y H:i:s');
                                        }    
                                      @endphp
                                    </p>
                                  </div>
                                  <div class="badge text-wrap text-success" style="width: 10rem">
                                    <p class="mb-0">Em transporte</p>
                                    <p class="mb-0 mt-1">
                                      @php
                                        if (!is_null($pedido->data_despache)) {
                                          $data_despache = DateTime::createFromFormat('Y-m-d H:i:s', $pedido->data_despache);
                                          echo $data_despache->format('d/m/Y H:i:s');
                                        }    
                                      @endphp
                                    </p>
                                  </div>
                                  <div class="badge text-wrap text-success" style="width: 10rem">
                                    <p class="mb-0">Entregue</p>
                                    <p class="mb-0 mt-1">
                                      @php
                                        if (!is_null($pedido->data_entrega)) {
                                          $data_entrega = DateTime::createFromFormat('Y-m-d H:i:s', $pedido->data_entrega);
                                          echo $data_entrega->format('d/m/Y H:i:s');
                                        }    
                                      @endphp
                                    </p>
                                  </div>

                                    @break
                                @case(5)
                                  <div style="width: 10rem">
                                  </div>
                                  <div style="width: 10rem">
                                  </div>
                                  <div style="width: 10rem">
                                  </div>
                                  <div class="badge text-wrap text-danger" style="width: 10rem">
                                    <p class="mb-0">Cancelado</p>
                                    <p class="mb-0 mt-1">
                                      @php
                                        if (!is_null($pedido->data_cancelado)) {
                                          $data_cancelado = DateTime::createFromFormat('Y-m-d H:i:s', $pedido->data_cancelado);
                                          echo $data_cancelado->format('d/m/Y H:i:s');
                                        }    
                                      @endphp
                                    </p>
                                  </div>
                                @default
                                    
                            @endswitch
                          </div>
                          <h5 class="mt-2">Endereço de entrega</h5>
                          <p class="font-weight-bolder mb-1">Endereço: <span class="font-weight-light">{{$pedido->endereco}}</span></p>
                          <p class="font-weight-bolder mb-1">Bairro: <span class="font-weight-light">{{$pedido->bairro}}</span></p>
                          <p class="font-weight-bolder mb-1">Cidade: <span class="font-weight-light">{{$pedido->cidade}}</span></p>
                          <p class="font-weight-bolder">Estado: <span class="font-weight-light">{{$pedido->estado}}</span></p>
                          <hr>
                          <h6 class="mb-0">Valor do frete: <span class="font-weight-light">R$ {{$pedido->frete}}</span></h6>
                          <h4>Subtotal: <span class="font-weight-light">R$ {{$pedido->value_total - $pedido->frete}}</span></h4>
                          <h4 class="mt-0">Valor total (c/ frete): <span class="font-weight-light">R$ {{$pedido->value_total}}</span></h4>
                          <button class="mdc-button mdc-button--raised general-button showProducts mt-2" type="button" data-pedido-id="{{$pedido->id}}" data-href="{{route('showOrderProducts')}}">
                            <span class="mdc-button__label">Ver produtos</span>
                          </button>
                          @if ($pedido->status_id == 1 || $pedido->status_id == 2)
                            <button class="mdc-button mdc-button--raised bg-danger actionButton mt-2" type="button" data-href="{{route('order.cancel', ['order_id'=>$pedido->id])}}">
                              <span class="mdc-button__label">Cancelar pedido</span>
                            </button>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  
              </td>
              <td class="pedido{{$loop->iteration}}-products bg-light" style="display: none">
              Produtos 
              </td>  
            </tr>    
          @endforeach
        </tbody>
      </table>
    </div>
    
    <div class="modal fade" id="orderProductsModal" tabindex="-1" role="dialog" aria-labelledby="orderProductsModal-title" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="orderProductsModal-title">Produtos da compra de número:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>Produtos</th>
                  <th>Quantidade/Preço</th>
                </tr>
              </thead>
              <tbody id="modalProductsBody">

              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button class="mdc-button mdc-button--raised bg-danger" data-dismiss="modal" id="closeModalOrderProducts">
              <span class="mdc-button__label">Fechar</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>
@endsection

@section('scripts')
  <script src="{{asset('js/customJs/order.js')}}"></script>
@endsection
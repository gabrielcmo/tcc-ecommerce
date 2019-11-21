
@extends('layouts.layout')

@section('content')
  <div class="container">
    <div class="alert alert-danger d-none" id="qtyAlert" role="alert"></div>
    @if(Cart::count() == 0)
      <h4 class="text-center mt-4">Seu carrinho está vazio!</h4>
    @else
    <div class="row mt-3">
      <h3 class="ml-4">Seu carrinho</h3>
    </div>
    <div class="row mt-1">
    
      <div class="col-lg-8">
        
        <table class="table table-borderless">
          <thead>
            <tr>
              <th>Produtos</th>
              <th>Quantidade</th>
              <th>Preço</th>
            </tr>
          </thead>
          <tbody>
            @foreach (Cart::content() as $item)
            <input type="hidden" class="product_id" value="{{$item->id}}" />
            <tr class="border-top" style="border-top-color: (0, 0, 0, 0.1)">
              <td class="w-50">
                <div class="media align-items-center">
                  @php
                  $img = Doomus\Product::find($item->id)->image;
                  @endphp
                  @if(isset($img[0]->filename))
                    @php
                      $img->filename = $img[0]->filename
                    @endphp
                  <img src={{asset("img/products/$img->filename")}} class="rounded" style="height: 4.5rem; width: 4.5rem"
                    alt="...">
                  @else
                  <img src="{{asset('/img/logo_icone.png')}}" class="rounded" style="height: 4.5rem; width: 4.5rem" alt="...">
                  @endif
                  <div class="media-body text-break ml-2 mt-0">
                    <a href="{{route('product.show', ['id'=>$item->id])}}">{{$item->name}}</a>
                  </div>
                </div>
              </td>
              <td class="w-25 align-middle">
                <input type="number" class="form-control inputQty" style="width:4.5rem" min="1"
                  value="{{ $item->qty }}" data-product="{{$loop->iteration}}">
                <a class="text-center" href="{{route('cart.remove', ['product_id'=>$item->rowId])}}">Remover</a>
                <span class="d-none {{"productValue$loop->iteration"}}">R$ {{$item->price}}</span>
                <span class="d-none {{"productRowId$loop->iteration"}}">{{$item->rowId}}</span>
                <span class="d-none {{"productId$loop->iteration"}}">{{$item->id}}</span>
              </td>
              <td class="{{"newProductValue$loop->iteration"}} w-25 align-middle eachProductValue"
                data-value={{$item->price*$item->qty}}>
                R${{$item->price*$item->qty}}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <a class="float-right mr-2" href="/">Continuar comprando</a>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12 p-3">
        <div class="p-3" style="background-color: #f7f5f3">
          <h4 class="d-flex justify-content-between align-items-center">
            <span class="text-muted">Resumo do pedido</span>
            <span class="badge badge-secondary">{{Cart::count()}}</span>
          </h4>
        
          <table class="table table-borderless">
            <tbody>
              <tr>
                <th>Subtotal</th>
                <td id="totalCart" class="text-right"></td>
              </tr>
              @if (session('valorFrete') !== null && session('prazoFrete') !== null)
                <tr id="dadosFrete">
                  <th id="prazoFrete" data-cep={{session('cep')}}>Frete (prazo de {{ session('prazoFrete') }} dias)</th>
                  <td id="valorFrete" class="text-right" data-valor-frete="{{session('valorFrete')}}">R$ 
                    @php
                      $valor_frete = (string) session('valorFrete');
                      echo str_replace('.', ',', $valor_frete);
                    @endphp
                  </td>
                </tr>
              @else
                <tr class="d-none" id="dadosFrete">
                  <th id="prazoFrete"></th>
                  <td id="valorFrete" class="text-right"></td>
                </tr>
              @endif
              <tr class="border-top">
                <th class="align-middle">Total</th>
                @if (session('valorFrete') !== null && session('prazoFrete') !== null)
                  <td id="valorTotalCompra" class="text-right w-50">R$ 
                    @php
                      $total = (string) Cart::total() + session('valorFrete');
                      // $total_formatted = number_format();
                      echo str_replace('.', ',', $total);
                    @endphp
                    
                  </td>
                @else
                  <td id="valorTotalCompra" class="text-right w-50">--</td>
                @endif
              </tr>
            </tbody>
          </table>
          <hr>
          <p class="p-1 mb-1">Calcule o frete e o prazo (opcional)</p>
          <form action="{{route('calcFrete')}}" method="post" id="formCalcularFrete" style="border-top-color: #d7cec7">
            <div class="input-group" id="inputBotaoCalcularFrete">
              <input type="number" class="form-control" name="cep" aria-label="CEP" placeholder="CEP" aria-describedby="botao-cep">
                <button class="mdc-button mdc-button--raised general-button" id="botaoCalcularFrete" style="border-radius: 0;" data-href="{{route('calcFrete')}}">
                  <span class="mdc-button__label" id="botaoCalcularFreteLabel">Calcular</span>
                </button>
              </div>
              <p class="text-danger d-none" id="cepErro"></p>
              <a href="#" class="btn btn-link" data-toggle="modal" data-target="#modalConsultarCep">
                <span class="mdc-button__label">Não sei meu cep</span>
              </a>
            </form>
            <hr>
            <button class="mdc-button mdc-button--raised general-button w-100 actionButton" id="botaoContinuarCarrinho" data-href="{{route('address-check')}}">
              <span class="mdc-button__label" id="botaoContinuarCarrinhoLabel">Continuar</span>
            </button>
          @endif
        </div>
      </div> 
    </div>
  </div>

  <div class="modal fade" id="modalConsultarCep" tabindex="-1" role="dialog" aria-labelledby="DescobrirCep" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="DescobrirCep">Descobrir seu CEP</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="GET" id="formDescobrirCep">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="rua">Endereço</label>
                  <input type="text" class="form-control" name="rua" id="rua" aria-describedby="ruaHelp" placeholder="Endereço">
                  <small id="emailHelp" class="form-text text-muted">Digite apenas o endereço da sua rua, sem o nrº da casa.</small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="cidade">Cidade</label>
                  <input type="text" name="cidade" id="cidade" class="form-control">
                </div>
              </div>  
            </div>
            <div class="row">              
              <div class="col">
                <div class="form-group">
                  <label for="estado">Estado</label>
                  <select name="estado" id="estado" class="form-control">
                    <option selected value="">Escolha o estado da sua cidade</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                  </select>
                </div>
              </div>
            </div>
            <button type="submit" class="mdc-button mdc-button--raised general-button ml-2">
              <span class="mdc-button__label">Descobrir CEP</span>
            </button>
            <div class="alert alert-success d-none mt-2" role="alert" id="cepSuccess"></div>
            <div class="alert alert-danger d-none mt-2" role="alert" id="cepError"></div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-success">Ok!</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script src="{{asset('js/customJs/cart.js')}}"></script>
@endsection
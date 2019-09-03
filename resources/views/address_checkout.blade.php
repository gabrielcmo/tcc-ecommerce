@extends('layouts.new_layout')

@section('title')
    Checkout
@endsection

@section('stylesheets')
    <style>
        .footer{
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div role="progressbar" class="mdc-linear-progress">
            <div class="mdc-linear-progress__buffering-dots"></div>
            <div class="mdc-linear-progress__buffer"></div>
            <div class="mdc-linear-progress__bar mdc-linear-progress__primary-bar">
                <span class="mdc-linear-progress__bar-inner"></span>
            </div>
            <div class="mdc-linear-progress__bar mdc-linear-progress__secondary-bar">
                <span class="mdc-linear-progress__bar-inner"></span>
            </div>
        </div>

        <h2 class="mt-1">Olá, {{ $user->name }}!</h2><br>

        <div class="row">   
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-muted">Seu carrinho</span>
                  <span class="badge badge-secondary badge-pill">{{ Cart::count() }}</span>
                </h4>
                <ul class="list-group mb-3">
                  @foreach (Cart::content() as $item)
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                          <div>
                              <h6 class="my-0">{{ $item->name }}</h6>
                              <small class="text-muted">{{ $item->description }}</small>
                          </div>
                          <span class="text-muted">{{ $item->qty }} x {{ $item->price }}</span>
                      </li>
                  @endforeach
                  <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                      <h6 class="my-0">Cupom</h6>
                      <small>TOGURO120</small>
                    </div>
                    <span class="text-success">-$5</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between">
                    <span>Total (BRL)</span>
                    <strong>{{Cart::total()}}</strong>
                  </li>
                </ul>
            
                <form class="card p-2">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cupom">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-secondary">Resgatar</button>
                    </div>
                  </div>
                </form>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Endereço de entrega</h4>
                <form action="/checkout/address/data" method="post">
                    @csrf

                    <div class="mdc-text-field mdc-text-field--outlined" style="width: 50%">
                        <input class="mdc-text-field__input" type="text" id="cpf" name="cpf">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="cpf" class="mdc-floating-label">CPF</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>

                    <div class="mdc-text-field mdc-text-field--outlined mt-2" style="width: 50%">
                        <input class="mdc-text-field__input" type="text" id="cep" name="cep">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="cep" class="mdc-floating-label">CEP</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>

                    <div class="mdc-text-field mdc-text-field--outlined mt-2" style="width: 50%">
                        <input class="mdc-text-field__input" type="text" id="bairro" name="bairro">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="bairro" class="mdc-floating-label">Bairro</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>



                    <div class="mdc-text-field mdc-text-field--outlined mt-2" style="width: 50%">
                        <input class="mdc-text-field__input" type="text" id="adress" name="adress">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="adress" class="mdc-floating-label">Rua</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>

                    <div class="mdc-text-field mdc-text-field--outlined mt-2" style="width: 50%">
                        <input class="mdc-text-field__input" type="number" id="n" name="n">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="n" class="mdc-floating-label">Número</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>

                    
                    
                    @if ($errors->has('cpf'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('cep'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cep') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('bairro'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bairro') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('n'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('n') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('state'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif

                    <div class="mdc-select mdc-select--outlined d-flex d-block mt-2 w-50">
                        <i class="mdc-select__dropdown-icon"></i>
                        <select class="mdc-select__native-control" name="state" id="state">
                            <option selected value=""></option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espirito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MT">Mato Grosso</option>
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
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label class="mdc-floating-label" for="state">Estado</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>

                    <div class="mdc-text-field mdc-text-field--outlined mt-2 w-50">
                        <input class="mdc-text-field__input" type="text" id="city" name="city">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="city" class="mdc-floating-label">Cidade</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>

                    @if ($errors->has('city'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <label class="custom-control-label" for="same-address">O endereço de entrega é o mesmo que o de pagamento</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Salvar minhas informações para próxima compra</label>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pronto</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
          function search(query = ''){
            $.ajax({
              url: "{{ route('checkCep') }}",
              method: 'GET',
              data: {query:query},
              success:function(result){
                $('#state option').each(function(){
                    if($(this).val() == result.uf){
                        $(this).attr('selected', true);
                        $('#state').attr('readonly', "readonly");
                    }
                });

                $('#city').val(result.localidade);
                $('#city').attr('readonly', "readonly");

                if(result.logradouro != '' && result.bairro != ''){
                    $('#address').val(result.logradouro);
                    $('#address').attr('readonly', "readonly");

                    $('#bairro').val(result.bairro);
                    $('#bairro').attr('readonly', "readonly");
                }
              }
            });
          }

          $('#cep').keyup(function(){
            if($(this).val().length > 8){
                $(this).val('');
                 alert('Seu CEP deve ter apenas 8 números.');
            }else{
                if($(this).val().length == 8){
                    var query = $('#cep').val();
                    
                    search(query);
                }
            }
          });
        });
    </script>
    <script src="{{asset('js/configCheckout.js')}}"></script>
@endsection

@extends('layouts.default')

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
        <div class="progress">
          <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
        </div><br>

        <h2>Olá, {{ $user->name }}!</h2><br>

        <div class="row">
            <div class="col-md-6">
                <h4>Dados de entrega</h4>
                <br>
                <form action="/checkout/address/data" method="post">
                    @csrf
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} col-md-6" type="text" name="name" placeholder="Nome completo">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <br>
                    <input class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }} col-md-6" type="text" name="cpf" placeholder="CPF">
                    @if ($errors->has('cpf'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                    @endif
                    <br>
                    <input class="form-control{{ $errors->has('cep') ? ' is-invalid' : '' }} col-md-6" type="number" name="cep" id="cep" placeholder="CEP" maxlength="8">
                    @if ($errors->has('cep'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cep') }}</strong>
                        </span>
                    @endif
                    <br>
                    <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" type="text" name="address" placeholder="Rua">
                    @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                    <br>
                    <input class="form-control{{ $errors->has('n') ? ' is-invalid' : '' }} col-md-3" type="number" name="n" placeholder="Número">
                    @if ($errors->has('n'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('n') }}</strong>
                        </span>
                    @endif
                    <br>
                    <select class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }} col-md-5" name="state" id="state">
                        <option selected value="">Estado</option>
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
                    @if ($errors->has('state'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif
                    <br>
                    <input class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }} col-md-6" type="text" name="city" id="city" placeholder="Cidade">
                    @if ($errors->has('city'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                    <br>
                    <button class="btn btn-success" type="submit">Pronto</button>
                </form>
            </div>
            <div class="col-md-6">
                <h4>Seu pedido</h4><br>

                @foreach(Cart::content() as $row)
                    {{ $row->name }} &nbsp; {{ $row->qty }} x {{ $row->price }} <br>
                @endforeach
                <br>
                Subtotal: {{Cart::subtotal()}} <br>
                Total: {{Cart::total()}}
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
                        $('#state').attr('disabled', true);
                    }
                });

                $('#city').val(result.localidade);
                $('#city').attr('disabled', true);

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
@endsection
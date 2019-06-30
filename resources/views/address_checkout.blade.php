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
                    <select class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }} col-md-5" name="state">
                        <option value="">Selecione seu estado</option>
                        <option value="SP">São Paulo</option>
                    </select>
                    @if ($errors->has('state'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif
                    <br>
                    <input class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }} col-md-6" type="text" name="city" placeholder="Cidade">
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
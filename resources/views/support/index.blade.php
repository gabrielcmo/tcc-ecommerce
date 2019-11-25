@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="row mt-3">
    <div class="col-12">
      <h3 class="text-center">Página de ajuda ao usuário</h3>
      <p class="text-center">Essa página foi criada com o intuito de auxiliar o usuário em alguns dos processos existentes em nosso website que possam gerar dúvidas aos usuários.</p>
    </div>
  </div>
  <div class="">
    <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pills-register-login-tab" data-toggle="pill" href="#pills-register-login" role="tab" aria-controls="pills-register-login" aria-selected="true">Registro e login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-cart-tab" data-toggle="pill" href="#pills-cart" role="tab" aria-controls="pills-cart" aria-selected="false">Carrinho</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-checkout-tab" data-toggle="pill" href="#pills-checkout" role="tab" aria-controls="pills-checkout" aria-selected="false">Realizar pedido</a>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-register-login" role="tabpanel" aria-labelledby="pills-register-login-tab">
        <div class="row">
          <div class="col-12">
            <h4 class="text-center">Registro e login</h4>
            <p class="text-center">A seguir, vamos mostrar como se realiza o cadastro de uma conta em nossa loja e de acessá-la</p>
            <h6 class="text-center">1º passo: Acessar a página de cadastro</h6>
            <img src="" alt="">
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-cart" role="tabpanel" aria-labelledby="pills-cart-tab">
        <div class="row">

        </div>
      </div>
      <div class="tab-pane fade" id="pills-checkout" role="tabpanel" aria-labelledby="pills-checkout-tab">
        <div class="row">

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
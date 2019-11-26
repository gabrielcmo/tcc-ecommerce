@extends('layouts.layout')

@section('title', 'Página de ajuda')

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
      <li class="nav-item">
        <a class="nav-link" id="pills-user-tab" data-toggle="pill" href="#pills-user" role="tab" aria-controls="pills-user" aria-selected="false">Abas do usuário</a>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-register-login" role="tabpanel" aria-labelledby="pills-register-login-tab">
        <div class="row">
          <div class="col-12">
            <h4 class="text-center">Registro e login</h4>
            <p class="text-center">A seguir, vamos mostrar como se realiza o cadastro de uma conta em nossa loja e como acessá-la</p>
            <h6 class="text-center">Formas de se cadastrar</h6>
            <p class="text-center">Há duas maneiras de se cadastrar em nosso website:</p>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <p class="text-center" style="height: 100px"><span class="font-weight-bold">1ª forma:</span> Logo na página inicial, clicando no campo "Entrar ou registrar" vai abrir uma janela, onde você pode clicar em "Cliente novo? Cadastre-se aqui". (imagem de apoio abaixo)</p>
                <img class="mx-auto d-block" height="400px" width="400px" src="{{asset('img/support/registro.jpg')}}" alt="">
              </div>
              <div class="col-md-6 col-sm-12">
                <p class="text-center" style="height: 100px"><span class="font-weight-bold">2ª forma:</span> Caso você seja redirecionado para a página de login durante seu acesso em nosso website e ainda não possui conta, temos a opção de cadastro na tela de login, basta clicar no campo "Cliente novo? Cadastre-se aqui". (imagem de apoio abaixo)</p>
                <img class="mx-auto d-block " height="400px" width="400px" src="{{asset('img/support/registro2.jpg')}}" alt="">
              </div>
            </div>
            <div class="row align-items-center mt-3">
              <div class="col-md-12 col-sm-12">
                <p class="text-center">Após clicar em um desses campos, você será redirecionado para a tela de registro, então só basta você colocar as informações solicitadas abaixo e clicar em "Registrar"! Boas compras :D (imagem de apoio abaixo)</p>
              </div>
              <div class="col-md-12 col-sm-12">
                <img class="mx-auto d-block" height="400px" width="400px" src="{{asset('img/support/registro1.jpg')}}" alt="">
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12">
            <h6 class="text-center">Formas de se logar</h6>
            <p class="text-center">Nosso site conta com o login pelo Google, para usar esse método basta você clicar em um dos campos escritos "Login com Google" ou "Google" nas páginas de login ou registro.</p>
            <p class="text-center">Porém, há outras duas formas de logar em nosso site:</p>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <p class="text-center" style="height: 100px"><span class="font-weight-bold">1ª forma:</span> Na página inicial, no canto superior direito você vai localizar um campo chamado "Entrar ou registrar", ao clicar nele, uma pequena tela aparecerá, nela você pode colocar seus dados e logar. (imagem de apoio abaixo)</p>
                <img class="mx-auto d-block" height="400px" width="400px" src="{{asset('img/support/login1.jpg')}}" alt="">
              </div>
              <div class="col-md-6 col-sm-12">
                <p class="text-center" style="height: 100px"><span class="font-weight-bold">2ª forma:</span> Durante o acesso, caso seja necessário, você será redirecionado para uma página de login, nela você poderá colocar seus dados já cadastrados e logar. (imagem de apoio abaixo)</p>
                <img class="mx-auto d-block" height="400px" width="400px" src="{{asset('img/support/login2.jpg')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-cart" role="tabpanel" aria-labelledby="pills-cart-tab">
        <div class="row">
          <div class="col-12">
            <h4 class="text-center">Carrinho</h4>
            <p class="text-center">Nessa aba, mostraremos algumas das interações possíveis do usuário com o carrinho de compras</p>
            <h6 class="text-center">Formas de adicionar um produto no carrinho</h6>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <p class="text-center" style="height: 130px"><span class="font-weight-bold">1ª forma:</span> Para adicionar uma única unidade de um produto rapidamente ao carrinho, você pode clicar no botão do carrinho com um ícone de "+". (imagem de apoio abaixo)</p>
                <img class="mx-auto d-block" height="400px" width="400px" src="{{asset('img/support/carrinho1.jpg')}}" alt="">
              </div>
              <div class="col-md-6 col-sm-12">
                <p class="text-center" style="height: 130px"><span class="font-weight-bold">2ª forma:</span> Outra forma de adicionar um produto ao carrinho é clicar em um produto para ver as suas informações, nesse caso, haverá um botão "Adicionar no carrinho" e nessa forma há também a possibilidade de você escolher inicialmente a quantidade que deseja do produto. (imagem de apoio abaixo)</p>
                <img class="mx-auto d-block" height="400px" width="400px" src="{{asset('img/support/carrinho2.jpg')}}" alt="">
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12">
            <h6 class="text-center">Acessar o carrinho</h6>
          </div>
          <p class="text-center">Para acessar o seu carrinho de compras, basta clicar no botão com o ícone de carrinho de compras no canto superior direito da tela
            <img class="mx-auto d-block img-fluid" src="{{asset('img/support/carrinho3.jpg')}}" alt="">
          </p>
        </div>
        <div class="row mt-3">
          <div class="col-12">
            <h6 class="text-center">Calcular frete e prazo</h6>
            <p class="text-center">Para calcular o frete e o prazo de entrega no carrinho de compras, basta você colocar o seu CEP no campo ao lado do botão "Calcular" e clicar nesse botão. (imagem de apoio abaixo)</p>
            <img class="mx-auto d-block img-fluid" src="{{asset('img/support/carrinho4.jpg')}}" alt="">
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12">
            <h6 class="text-center">Alterar quantidade do produto no carrinho</h6>
            <p class="text-center">Para alterar a quantidade de um determinado produto no carrinho, basta você alterar o valor do campo na frente de seu nome, ao alterar a quantidade, o valor será recalculado e exibido para você. (imagem de apoio abaixo)</p>
            <img class="mx-auto d-block img-fluid" src="{{asset('img/support/carrinho5.jpg')}}" alt="">
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-checkout" role="tabpanel" aria-labelledby="pills-checkout-tab">
        <div class="row">
          <div class="col-12">
            <h4 class="text-center">Confirmação do pedido</h4>
            <p class="text-center">Nessa aba, mostraremos os processos que se pode fazer para realizar um pedido</p>
            <h6 class="text-center">Endereço de entrega e cupom</h6>
            <p class="text-center">O primeiro passo para confirmar uma compra é colocar o seu endereço de entrega e caso você possua um cupom, também irá poder colocar para te garantir um desconto em cima do valor dos produtos :D. Além disso, também possuímos o botão "Usar endereço salvo" que ao ser clicado preenche todos os campos do endereço de entrega com o endereço da compra anterior (caso tenha escolhido armazenar) automaticamente. (imagem de apoio abaixo)</p>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <p class="text-center">Campo para colocar o cupom</p>
                  <img class="mx-auto d-block img-fluid" src="{{asset('img/support/pedido1.jpg')}}" alt="">
              </div>
              <div class="col-md-6 col-sm-12">
                <p class="text-center">Local para colocar o endereço de entrega ou usar o anterior</p>
                <img class="mx-auto d-block img-fluid" src="{{asset('img/support/pedido2.jpg')}}" alt="">
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12">
            <h6 class="text-center">Efetuar pagamento do pedido</h6>
            <p class="text-center">Ao clicar em "Continuar" na aba do endereço, você será redirecionado para a página de confirmação de pagamento, onde temos o PayPal como principal método para realizar o pagamento. Também possuímos um botão "Revisar pedido" onde é possível alterar a quantidade dos produtos do pedido ou remover alguns</p>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <p class="text-center" style="height: 60px">Área para ver as informações do endereço de entrega e botão para revisar o pedido antes de confirmar.</p>
                <img class="mx-auto d-block img-fluid" src="{{asset('img/support/pedido3.jpg')}}" alt="">
              </div>
              <div class="col-md-6 col-sm-12">
                <p class="text-center" style="height: 60px">Botão que redireciona para o PayPal para efetuar o pagamento.</p>
                <img class="mx-auto d-block img-fluid" src="{{asset('img/support/pedido4.jpg')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
        <div class="row">
          <div class="col-12">
            <h4 class="text-center">Abas do usuário</h4>
            <p class="text-center">Abas de informações que o usuário pode acessar</p>
            <h6 class="text-center">Histórico de pedidos</h6>
            <p class="text-center">Nessa aba, você pode acessar o histórico contento todos os seus pedidos, e suas respectivas informações (imagem de apoio abaixo)</p>
            <img class="mx-auto d-block" src="{{asset('img/support/usuario1.jpg')}}" alt="">
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12">
            <h6 class="text-center">Histórico de avaliações e histórico de tickets</h6>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <p class="text-center">Histórico de avaliações</p>
                <p class="text-center">Nessa aba há todas as suas avaliações dos produtos que lhe foram entregues, tendo a opção de excluir ou alterar uma avaliação específica</p>
                <img class="mx-auto d-flex img-fluid" src="{{asset('img/support/usuario2.jpg')}}" alt="">
              </div>
              <div class="col-md-6 col-sm-12">
                <p class="text-center">Histórico de tickets</p>
                <p class="text-center">Nessa parte, é possível ver todos os tickets de suporte e ver os status em que eles se encontram.</p>
                <img class="mx-auto d-flex img-fluid" src="{{asset('img/support/usuario3.jpg')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-admin" role="tabpanel" aria-labelledby="pills-admin-tab">
        <div class="row">
          <div class="col-12">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
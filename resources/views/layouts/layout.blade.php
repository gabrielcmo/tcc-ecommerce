<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/828f671aa2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{asset('/css/general.css')}}">
  @yield('stylesheets')
</head>
<body style="background-color: white;">
  <header class="mdc-top-app-bar mdc-top-app-bar--fixed" id="topAppBar" style="background-color: #D7CEC7;">  
      <div class="mdc-top-app-bar__row">
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
          <button class="material-icons mdc-icon-button mdc-top-app-bar__navigation-icon d-none" id="sidebarMenuButton">menu</button>
          <span class="mdc-top-app-bar__title"><a style="" href="{{ route('landing') }}"><img src="{{ asset('/img/logo_inteiro.png') }}" width="130px" id="imgLogo" alt=""></a></span>
          <div class="dropdown ml-md-3 ml-sm-3 ml-lg-5" id="searchFormPc">
            <form class="form-inline">
              <input class="form-control dropdown-toggle" size="40" id="searchPc" type="search" placeholder="Pesquise.. Ex: Travesseiro" autocomplete="off" aria-label="Search">
            </form>
            <div aria-labelledby="search">
              <ul class="dropdown-menu w-100" id="resultPc"></ul>
            </div>
          </div>
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar" style="margin-right: 5%;">
          <div class="dropdown" id="dropdown">
            <button class="btn btn-link dropdown-toggle nounderline" style="color:#565656;text-decoration:none!important;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @auth
                Olá {{ Auth::user()->name }}   
              @else
                Entrar ou registrar
              @endif
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              @auth
                <a class="dropdown-item" href="{{ route('perfil') }}">Meu perfil</a>
                @if(Auth::user()->role_id == 1)
                  <a class="dropdown-item" href="{{route('admin.index')}}">Painel de Controle</a>
                @endif
                <a class="dropdown-item" href="{{ route('orders') }}">Meus pedidos</a>
                <a class="dropdown-item" href="{{ route('tickets') }}">Meus tickets</a>
                <a class="dropdown-item" href="{{ route('rating.index') }}">Minhas avaliações</a>
                <a class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" href="#">Sair</a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              @else
                <h4 class="text-center">Login</h4>
                <hr>
                <form class="ml-3 mr-3 pb-2" action="{{ route('login') }}" method="post" id="loginDropdownForm">
                  @csrf
                  <div class="form-group">
                    <input type="text" class="form-control login-email" id="email" name="email" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control login-password" id="password" name="password" placeholder="Senha" required>
                  </div>
                  <button class="mdc-button mdc-button--raised" style="background-color:#76323f" type="submit">
                    <span class="mdc-button__label">Entrar</span>
                  </button>
                  <a class="pb-2 float-right text-dark" style="font-size: 14px" href="{{route('register')}}">Cliente novo? Cadastre-se aqui</a> 
                  <a class="pb-2 float-right text-dark" href="{{route('loginSocial', ['provider'=>'google'])}}">
                    <i class="fab fa-google" style="font-size: 14px; margin-right: 10px"></i>Entrar com Google
                  </a>
                </form>
              @endif
            </div>
          </div>
          <button class="mdc-button mdc-button--raised actionButton general-button mr-1" data-href="{{ route('user.cart') }}" style="background-color: #" id="cartButton">
            <i class="fas fa-shopping-cart" aria-hidden="true"></i>
            @if(Cart::count() > 0)
              <span id="countCart" class="badge badge-light ml-1">{{ Cart::count() }}</span>
            @endif
          </button>
        </section>
      </div>
  </header>
  
  <aside class="mdc-drawer mdc-drawer--modal d-none" id="sidebarMenu">
    @auth
      <div class="mdc-drawer__header">
        <h3 class="mdc-drawer__title">{{ Auth::user()->name }}</h3>
        <h6 class="mdc-drawer__subtitle">{{ Auth::user()->email }}</h6>
      </div>
      
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        {{ csrf_field() }}
      </form>
    @else
      <div class="mdc-drawer__header">
        <h3 class="mdc-drawer__title">Visitante</h3>
      </div>
    @endauth
    <div class="mdc-drawer__content" style="position:relative">
      @auth
        <div class="mdc-list">
          <a class="mdc-list-item mdc-list-item--activated" href="{{route('landing')}}" aria-current="page">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">home</i>
            <span class="mdc-list-item__text">Home</span>
          </a>
          <a class="mdc-list-item" href="{{ route('perfil') }}">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">person</i>
            <span class="mdc-list-item__text">Meu perfil</span>
          </a>
          @if(Auth::user()->role_id == 1)
            <a class="mdc-list-item" href="/admin">
              <i class="material-icons mdc-list-item__graphic" aria-hidden="true">show_chart</i>
            <span class="mdc-list-item__text">Painel de administração</span>
            </a>
          @endif
          <a class="mdc-list-item" href="{{ route('orders') }}">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">drafts</i>
            <span class="mdc-list-item__text">Meus pedidos</span>
          </a>
          <a class="mdc-list-item" href="{{ route('tickets') }}">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">contact_support</i>
            <span class="mdc-list-item__text">Meus tickets</span>
          </a>
          <a class="mdc-list-item" href="{{ route('rating.index') }}">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">tag_faces</i>
            <span class="mdc-list-item__text">Minhas avaliações</span>
          </a>
          <a class="mdc-list-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">close</i>
            <span class="mdc-list-item__text">Sair</span>
          </a>
        </div>
        
      @else
        <div class="mdc-list">
          <a class="mdc-list-item mdc-list-item--activated" href="{{route('landing')}}" aria-current="page">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">home</i>
            <span class="mdc-list-item__text">Home</span>
          </a>
        </div>
      @endif
      @guest
        <button data-href="{{route('login')}}" data-toggle="modal" data-target="#modalLogin" class="mdc-button mdc-button--raised actionButton general-button" style="position:absolute; bottom: 45px; left: 0; margin-bottom: 20px; margin-left: 10px;">
          <span class="mdc-button__label">Entrar</span>
        </button>
        <button data-href="{{route('register')}}" data-toggle="modal" data-target="#modalRegister" class="mdc-button mdc-button--raised actionButton general-button" style="position:absolute; bottom: 45px; right: 0; margin-bottom: 20px; margin-right: 10px;">
          <span class="mdc-button__label">Registrar</span>
        </button>
        <button data-href="{{route('loginSocial', ['provider'=>'google'])}}" class="mdc-button mdc-button--raised actionButton general-button" style="position:absolute; bottom: 0; width: 235px; margin-right: 10px; margin-left: 10px; margin-bottom: 20px">
          <i class="mdc-button__icon fab fa-google" style="font-size: 18px; margin-right: 5px"></i>
          <span class="mdc-button__label">Entrar com Google</span>
        </button>
      @endguest
    </div>
  </aside>
  <div class="mdc-drawer-scrim"></div>
  <div class="mdc-top-app-bar--fixed-adjust">
    <div class="dropdown w-100 mb-5 d-none" id="searchFormCellphone">
      <form class="form-inline">
        <input class="form-control dropdown-toggle" id="searchCellphone" type="search" placeholder="Pesquise.. Ex: Travesseiro" autocomplete="off" aria-label="Search" style="border-radius: 0;">
      </form>
      <div aria-labelledby="search">
        <ul class="dropdown-menu w-100" id="resultCellphone"></ul>
      </div>
    </div>
    <div class="nav-scroller bg-light shadow-sm mb-2" id="topAppBar2">
      <nav class="nav nav-underline d-none" style="background-color:white;">
        <a class="nav-link mx-auto" style="color:#76323f;" href="{{ route('explore') }}"><h5>Explore</h5></a>
        <a class="nav-link mx-auto" style="color:#76323f;" href="{{ route('offers') }}"><h5>Ofertas imperdíveis</h5></a>
        <a class="nav-link mx-auto" style="color:#76323f;" href="{{ route('customizeQuarto') }}"><h5>Customize seu quarto</h5></a>
      </nav>
    </div>
    <main class="main-content" id="main-content">
      @if(Session::has('status'))
        @if(Session::has('status-type'))
          <div class="alert alert-{{Session::get('status-type')}} alert-dismissible fade show container" role="alert">
            <strong>{{ Session::get('status') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @else
          <div class="alert alert-info alert-dismissible fade show container" role="alert">
            <strong>{{ Session::get('status') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
      @endif
      
      @yield('content')

      <button class="mdc-fab general-button actionButton" data-href="{{route('ticket.create')}}" id="supportButton" aria-label="Criar ticket" title="Criar ticket suporte">
        <i class="mdc-fab__icon material-icons">contact_support</i>
      </button>

    </main>
  </div>

  <footer class="row footer align-items-center p-3" style="background-color: #D7CEC7;">
    <div class="col-lg-3">
        <img src="{{asset('img/logo_inteiro.png')}}" class="img-fluid h-25 mx-auto d-block" width="200px" alt="Logo doomus">
    </div>
    <div class="col-lg-6">
        <p class="text-center mb-1">
          <a href="#" style="color: black;"><i class="fab fa-facebook-square footer-social-icons" style="font-size: 40px"></i></a>
          <a href="#" style="color: black;"><i class="fab fa-twitter-square footer-social-icons" style="font-size: 40px"></i></a>
          <a href="#" style="color: black;"><i class="fab fa-instagram footer-social-icons" style="font-size: 40px"></i></a>
        </p>
        <p class="text-center mb-0">Todos os direitos reservados aos criadores do website Doomus</p>
        <p class="text-center font-weight-bolder">&copy; Copyright 2019</p>
    </div>
    <div class="col-lg-3">
      <p class="mb-0 text-center font-weight-bolder">Contato</p>
      <p class="mb-0 text-center">suporte@doomus.com.br</p>
      <p class="mb-0 mt-2 text-center"><a href="{{ route('docs') }}">FAQ (Dúvidas Frequentes)</a></p>
      <p class="mb-0 mt-2 text-center"><a href="{{ route('support.index') }}">Página de ajuda</a></p>
    </div>
  </footer>
  
  <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
  <script src="{{asset('/js/jquery-3.4.1.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
  {{-- Custom Stylesheets --}}
  <script src="{{asset('js/customJs/layout.js')}}"></script>
  <script>
    function fetch_data(query = '', device = ''){
      $.ajax({
        url: "{{ route('search') }}",
        method: 'GET',
        data: {query:query},
        success:function(result){
          if (device == 'PC') {
            $('#resultPc').fadeIn();
            $('#resultPc').html(result);
            
          } else {
            $('#resultCellphone').fadeIn();
            $('#resultCellphone').html(result);
          }
        }
      });
    }

    $('#searchPc').keyup(function(){
      if($('#searchPc').val() !== ""){
        $('#resultPc').removeClass('d-none');
        var query = $(this).val();
        fetch_data(query, 'PC');
      }else{
        $('#resultPc').addClass('d-none');
      }
    });
    $('#searchCellphone').keyup(function(){
      if($('#searchCellphone').val() !== ""){
        $('#resultCellphone').removeClass('d-none');
        var query = $(this).val();
        fetch_data(query, 'CELL');
      }else{
        $('#resultCellphone').addClass('d-none');
      }
    });
  </script>
  @yield('scripts')
  {!! NoCaptcha::renderJs() !!}
</body>
</html>
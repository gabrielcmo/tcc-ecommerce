<!DOCTYPE html>
<html lang="en">
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
  <link rel="stylesheet" href="{{asset('css/general.css')}}">
  @yield('stylesheets')
</head>
<<<<<<< HEAD
<body style="background-color: #e9e9e9;">
        <header class="mdc-top-app-bar mdc-top-app-bar--fixed" id="topAppBar">
          <div class="mdc-top-app-bar__row">
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
              <button class="material-icons mdc-icon-button mdc-top-app-bar__navigation-icon d-none" id="sidebarMenuButton">menu</button>
              <span class="mdc-top-app-bar__title"><a style="color:white;" href="{{ route('landing') }}">Doomus</a></span>       
            </section>
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar" style="margin-right: 5%;">
              <div class="mdc-menu-surface--anchor" id="allMenu">
                <button class="mdc-button mdc-top-app-bar__action-item" id="menuButton">
                  <i class="material-icons mdc-button__icon" aria-hidden="true" style="font-size: 22px; margin-top: -6px">person</i>  
                  @auth
                      Olá {{ Auth::user()->name }}
                  @else
                    <span class="mdc-button__label">entre ou registre-se</span>
                  @endauth
                </button> 
                <div class="mdc-menu mdc-menu-surface" id="menu">
                    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
                      @auth
                        <li class="mdc-list-item" role="menuitem">
                          <a class="mdc-list-item" href="{{ route('perfil') }}">
                            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">person</i>
                            <span class="mdc-list-item__text">Minha conta</span>
                          </a>
                        </li>
                        <li class="mdc-list-item" role="menuitem">
                          <a class="mdc-list-item" href="{{ route('orders') }}">
                            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">history</i>
                            <span class="mdc-list-item__text">Meus pedidos</span>
                          </a>
                        </li>
                        @if(Auth::user()->role_id == 1)
                          <li class="mdc-list-item" role="menuitem">
                            <a class="mdc-list-item" href="{{ route('admin.index') }}">
                              <i class="material-icons mdc-list-item__graphic" aria-hidden="true">history</i>
                              <span class="mdc-list-item__text">Painel de controle</span>
                            </a>
                          </li>
                        @endif
                        <li class="mdc-list-item" role="menuitem">
                          <a class="mdc-list-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                              {{ __('Sair') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                        </li>
                      @else
                        <li class="mdc-list-item" id="loginMenu" role="menuitem">
                          <span class="mdc-list-item__text">Entrar</span>
                        </li>
                        <li class="mdc-list-item" id="registerMenu" role="menuitem">
                          <span class="mdc-list-item__text">Registrar</span>
                        </li>
                        <li class="mdc-list-divider" role="separator"></li>
                        <li class="mdc-list-item actionButton" role="menuitem" data-href="{{route('loginSocial', ['provider'=>'google'])}}">
                          <i class="fab fa-google" style="font-size: 20px; margin-right: 5px"></i>
                          <span class="mdc-list-item__text">Entrar com Google</span>
                        </li>
                      @endauth
                    </ul>
                </div>
              </div>
              <button class="mdc-button mdc-top-app-bar__action-item" id="cartMenu">
                <i class="material-icons mdc-button__icon" aria-hidden="true" style="font-size: 22px; margin-top: -6px">shopping_cart</i>
                @if(Cart::count() > 0)
                  <span class="badge badge-light">{{ Cart::count() }}</span>
=======
<body style="background-color: white;">
  <header class="mdc-top-app-bar mdc-top-app-bar--fixed" id="topAppBar" style="z-index: 1000; background-color: #D7CEC7;">
      <div class="mdc-top-app-bar__row">
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
          <button class="material-icons mdc-icon-button mdc-top-app-bar__navigation-icon d-none" id="sidebarMenuButton">menu</button>
          <span class="mdc-top-app-bar__title"><a style="color:white;" href="{{ route('landing') }}">Doomus</a></span>       
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar" style="margin-right: 5%;">
          <div class="dropdown" id="dropdown">
            <button class="btn btn-link text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                  <a class="dropdown-item" href="/admin">Painel de Controle</a>
>>>>>>> b7b0ab7b5723493caee13a62171b6b6812ae1840
                @endif
                <a class="dropdown-item" href="{{ route('orders') }}">Pedidos</a>
                <a class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" href="#">Sair</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  {{ csrf_field() }}
                </form>
              @else
                <h4 class="text-center">Login</h4>
                <hr>
                <form class="ml-3 mr-3 pb-2" action="{{ route('login') }}" method="post">
                  @csrf
                  <div class="mdc-text-field login-email w-100">
                    <input type="text" class="mdc-text-field__input" id="email-input" name="email" required>
                    <label class="mdc-floating-label" for="email-input">Email</label>
                    <div class="mdc-line-ripple"></div>
                  </div>
                  <div class="mdc-text-field login-password">
                    <input type="password" class="mdc-text-field__input" id="password-input" name="password" required minlength="6">
                    <label class="mdc-floating-label" for="password-input">Senha</label>
                    <div class="mdc-line-ripple"></div>
                  </div>
                  <button class="btn btn-primary" type="submit">Entrar</button>
                  <a class="pb-2 float-right text-dark" style="font-size: 14px" href="{{route('register')}}">Cliente novo? Cadastre-se</a> 
                  <a class="pb-2 float-right text-dark" href="{{route('loginSocial', ['provider'=>'google'])}}">
                    <i class="fab fa-google" style="font-size: 14px; margin-right: 10px"></i>Entrar com Google
                  </a>
                </form>
              @endif
            </div>
          </div>
          <button class="mdc-button mdc-button--raised actionButton general-button" data-href="{{ route('user.cart') }}" style="background-color: #" id="cartButton">
            <i class="fas fa-shopping-cart" aria-hidden="true"></i>
            @if(Cart::count() > 0)
              <span class="badge badge-light ml-1">{{ Cart::count() }}</span>
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
      <a class="btn btn-danger btn-sm mt-1 mb-2" style="" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" href="#">Sair</a>
      
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
          <a class="mdc-list-item" href="{{ route('perfil') }}">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">person</i>
            <span class="mdc-list-item__text">Meu perfil</span>
          </a>
          @if(Auth::user()->role_id == 1)
            <a class="mdc-list-item" href="/admin">
              <i class="material-icons mdc-list-item__graphic" aria-hidden="true">drafts</i>
              <span class="mdc-list-item__text">Painel de administração</span>
            </a>
          @endif
          <a class="mdc-list-item" href="{{ route('orders') }}">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">drafts</i>
            <span class="mdc-list-item__text">Pedidos</span>
          </a>
        </div>
        
      @else
        <div class="mdc-list"></div>
      @endif
      @guest
        <button data-toggle="modal" data-target="#modalLogin" class="mdc-button mdc-button--raised" style="position:absolute; bottom: 45px; left: 0; margin-bottom: 20px; margin-left: 10px;">
          <span class="mdc-button__label">Entrar</span>
        </button>
        <button data-toggle="modal" data-target="#modalRegister" class="mdc-button mdc-button--raised" style="position:absolute; bottom: 45px; right: 0; margin-bottom: 20px; margin-right: 10px;">
          <span class="mdc-button__label">Registrar</span>
        </button>
        <button data-href="{{route('loginSocial', ['provider'=>'google'])}}" class="mdc-button mdc-button--raised actionButton" style="position:absolute; bottom: 0; width: 235px; margin-right: 10px; margin-left: 10px; margin-bottom: 20px">
          <i class="mdc-button__icon fab fa-google" style="font-size: 18px; margin-right: 5px"></i>
          <span class="mdc-button__label">Entrar com Google</span>
        </button>
      @endguest
    </div>
  </aside>

  <div class="mdc-drawer-scrim"></div>
  <div class="mdc-top-app-bar--fixed-adjust">
    <div class="nav-scroller bg-light shadow-sm mb-2" id="topAppBar2">
      <nav class="nav nav-underline">
        <a class="nav-link mx-auto" href="#">Explore</a>
        <a class="nav-link mx-auto" href="#">Ofertas Katiau</a>
        <a class="nav-link mx-auto" href="#">Customize sua cozinha</a>
        <a class="nav-link mx-auto" href="#">Para os que amam o luxo</a>
        <a class="nav-link mx-auto" href="#">Seu quarto do seu jeito</a>
      </nav>
    </div>
  </div>

  <div class="mdc-drawer-scrim"></div>
    <main class="main-content" id="main-content">
      <div class="container-fluid">
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
      </div>
    </main>
  </div>

  {{-- Modais --}}
  <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="TituloModalLogin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="TituloModalLogin">Login</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('login')}}" method="POST" id="loginForm">
            @csrf
            <div class="container-fluid">
              <div class="row align-items-center">
                  <img src="{{asset('img/logo_icone.png')}}" width="50%" height="50%" alt="Logo Doomus" class="img-fluid mx-auto">
              </div>
              <div class="row justify-content-center">
                <div class="mdc-text-field mdc-text-field--outlined" style="width: 80%"> 
                  <input type="text" id="email-text-field" class="mdc-text-field__input" name="email">
                  <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                      <label for="email-text-field" class="mdc-floating-label">Email</label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="mdc-text-field mdc-text-field--outlined mt-3" style="width: 80%">
                  <input type="password" id="password-text-field" class="mdc-text-field__input" name="password">
                  <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                      <label class="mdc-floating-label" for="password-text-field">Senha</label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                  </div>
                </div>
              </div><br>
              <button class="mdc-button mdc-button--raised float-right" type="submit" form="loginForm">
                <span class="mdc-button__label">Logar</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>  
  </div>

  <div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="TituloModalRegister" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="TituloModalRegister">Registro</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('register')}}" method="POST" id="registerForm">
            @csrf
            <div class="container-fluid">
              <div class="row justify-content-center">
                  <img src="{{asset('img/logo_icone.png')}}" width="35%" height="35%" alt="Logo Doomus" class="img-fluid mx-auto">
              </div>
              <div class="row justify-content-center">
                <div class="mdc-text-field mdc-text-field--outlined" style="width: 80%;">
                  <input class="mdc-text-field__input" id="name-text-field" type="text" name="name">
                  <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                      <label for="name-text-field" class="mdc-floating-label">Nome</label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center mt-2">
                <div class="mdc-text-field mdc-text-field--outlined" style="width: 80%;">
                  <input class="mdc-text-field__input" id="email-text-field" type="email" name="email">
                  <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                      <label for="email-text-field" class="mdc-floating-label">Email</label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center mt-2">
                <div class="mdc-text-field mdc-text-field--outlined" style="width: 40%;">
                  <input class="mdc-text-field__input" id="password-text-field" type="password" minlength="8" name="password">
                  <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                      <label for="password-text-field" class="mdc-floating-label">Senha</label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                  </div>
                </div>
                <div class="mdc-text-field mdc-text-field--outlined ml-1" style="width: 40%;">
                  <input class="mdc-text-field__input" id="password-confirmation-text-field" type="password" minlength="8" name="password_confirmation">
                  <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                      <label for="password-confirmation-text-field" class="mdc-floating-label">Confirme sua senha</label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                  </div>
                </div>
                <div class="row justify-content-center mt-2">
                  <div class="col-md-12">
                      {!! NoCaptcha::display() !!}        
                  </div>                   
              </div>
              </div>
            </div>
          </form>
          <button class="mdc-button mdc-button--raised float-right mt-2" type="submit" form="registerForm">
            <span class="mdc-button__label">Registrar</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="cartModal1" tabindex="-1" role="dialog" aria-labelledby="ModalCarrinho" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="ModalCarrinho">Carrinho</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @if(Cart::count() == 0)
            <h4>Seu carrinho está vazio!</h4>
          @else
          <a class="btn btn-danger" href="/carrinho/delete">Limpar carrinho</a><br><br>
          <div class="row">
            <div class="col-md-12">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor unitário</th>
                    <th scope="col">Valor total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach(Cart::content() as $item)
                    <tr>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->qty }}</td>
                      <td>{{ $item->price }}</td>
                      <td>{{ $item->price*$item->qty }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              </div>
          </div>
          @endif
        </div>
        @if(Cart::count() > 0)
          <div class="modal-footer">
            <a class="btn btn-success" href="/checkout/endereco">Fazer pedido</a>
          </div>
        @endif
      </div>
    </div>
  </div>
  <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  {{-- Custom Stylesheets --}}
  <script src="{{asset('js/customJs/layout.js')}}"></script>
  @yield('scripts')
  {!! NoCaptcha::renderJs() !!}
</body>
</html>
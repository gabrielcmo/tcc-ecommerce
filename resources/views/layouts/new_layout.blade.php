<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{asset('css/config.css')}}">
  @yield('stylesheets')
  <link rel="stylesheet" href="{{asset('css/icons.css')}}">
</head>
<body style="background-color: #e9e9e9;">
        <header class="mdc-top-app-bar mdc-top-app-bar--fixed" id="topAppBar">
          <div class="mdc-top-app-bar__row">
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
              <button class="material-icons mdc-icon-button mdc-top-app-bar__navigation-icon d-none" id="sidebarMenuButton">menu</button>
              <span class="mdc-top-app-bar__title">Doomus</span>       
            </section>
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar" style="margin-right: 5%;">
              <div class="mdc-menu-surface--anchor" id="allMenu">
                <button class="mdc-button mdc-top-app-bar__action-item" id="menuButton">
                  <i class="material-icons mdc-button__icon" aria-hidden="true" style="font-size: 22px; margin-top: -6px">person</i>  
                  <span class="mdc-button__label">Entrar</span>
                </button> 
                <div class="mdc-menu mdc-menu-surface" id="menu">
                    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
                      <li class="mdc-list-item" id="loginMenu" role="menuitem">
                        <span class="mdc-list-item__text">Logar</span>
                      </li>
                      <li class="mdc-list-item" id="registerMenu" role="menuitem">
                        <span class="mdc-list-item__text">Registrar</span>
                      </li>
                      <li class="mdc-list-divider" role="separator"></li>
                      <li class="mdc-list-item actionButton" role="menuitem" data-href="{{route('loginSocial', ['provider'=>'google'])}}">
                        <i class="fab fa-google" style="font-size: 20px; margin-right: 5px"></i>
                        <span class="mdc-list-item__text">Entrar com Google</span>
                      </li>
                    </ul>
                </div>
              </div>
              <button class="mdc-button mdc-top-app-bar__action-item">
                <i class="material-icons mdc-button__icon" aria-hidden="true" style="font-size: 22px; margin-top: -6px">shopping_cart</i>
                <span class="badge badge-light">+1</span>
              </button>
            </section>
          </div>
        </header>
        
        <aside class="mdc-drawer mdc-drawer--modal d-none" id="sidebarMenu">

          <div class="mdc-drawer__header">
            <h3 class="mdc-drawer__title">Geovanne Padilha</h3>
            <h6 class="mdc-drawer__subtitle">geovannepad@gmail.com</h6>
          </div>
          <div class="mdc-drawer__content" style="position:relative">
            <div class="mdc-list">
              <a class="mdc-list-item mdc-list-item--activated" href="#" aria-current="page">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">home</i>
                <span class="mdc-list-item__text">Home</span>
              </a>
              <a class="mdc-list-item" href="#">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">person</i>
                <span class="mdc-list-item__text">Minha conta</span>
              </a>
              <a class="mdc-list-item" href="#">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">history</i>
                <span class="mdc-list-item__text">Meus pedidos</span>
              </a>
              <a class="mdc-list-item" href="#">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">drafts</i>
                <span class="mdc-list-item__text">Drafts</span>
              </a>
            </div>
            <button data-href="{{route('register')}}" class="mdc-button mdc-button--raised" style="position:absolute; bottom: 45px; right: 0; margin-bottom: 20px; margin-right: 10px;">
              <span class="mdc-button__label">Registrar</span>
            </button>
            <button data-href="{{route('login')}}" class="mdc-button mdc-button--raised" style="position:absolute; bottom: 45px; left: 0; margin-bottom: 20px; margin-left: 10px;">
              <span class="mdc-button__label">Logar</span>
            </button>
            <button data-href="{{route('loginSocial', ['provider'=>'google'])}}" class="mdc-button mdc-button--raised actionButton" style="position:absolute; bottom: 0; width: 235px; margin-right: 10px; margin-left: 10px; margin-bottom: 20px">
              <i class="mdc-button__icon fab fa-google" style="font-size: 18px; margin-right: 5px"></i>
              <span class="mdc-button__label">Entrar com Google</span>
            </button>
          </div>
        </aside>

        <div class="mdc-drawer-scrim"></div>
        <div class="mdc-top-app-bar--fixed-adjust">
          <main class="main-content" id="main-content">
            <div class="container-fluid">
              @yield('content')
            </div>
          </main>
        </div>

        {{-- Modais --}}
        <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="TituloModalLogin" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="TituloModalLogin">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row justify-content-center">
                  <img src="{{asset('img/logo_icone.png')}}" alt="Logo Doomus" class="img-fluid">
                  <h1 style="font-family: 'Roboto'">DOOMUS</h1>
                </div>
                <form action="{{ route('login') }}" method="POST">
                  <div class="container-fluid">
                  
                  <div class="row justify-content-center">
                  <div class="mdc-text-field mdc-text-field--outlined"> 
                    <input type="email" name="email" id="email-text-field" class="mdc-text-field__input">
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label for="email-text-field" class="mdc-floating-label">E-Mail</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                  </div>
                  <div class="row justify-content-center">
                  <div class="mdc-text-field mdc-text-field--outlined mt-3">
                    <input type="password" name="password" id="password-text-field" class="mdc-text-field__input">
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label" for="password-text-field">Senha</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                  </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button class="mdc-button mdc-button--raised" type="submit">
                  <span class="mdc-button__label">Logar</span>
                </button>
                <button class="mdc-button mdc-button--raised">
                  <span class="mdc-button__label">Fechar</span>
                </button>
              </div>
            </div>
          </div>  
        </div>

        <div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="TituloModalRegister" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="TituloModalRegister">Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true"></span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                  <div class="container-fluid">
                    <div class="row justify-content-center">
                      <img src="{{asset('img/logo_icone.png')}}" alt="Logo Doomus" class="img-fluid">
                      <h1 style="font-family: 'Roboto'">DOOMUS</h1>
                    </div>
                    <div class="row justify-content-center">
                      <div class="mdc-text-field mdc-text-field--outlined">
                        <input class="mdc-text-field__input" id="name-text-field" type="text">
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
                      <div class="mdc-text-field mdc-text-field--outlined">
                        <input class="mdc-text-field__input" id="email-tex-field" type="text">
                        <div class="mdc-notched-outline">
                          <div class="mdc-notched-outline__leading"></div>
                          <div class="mdc-notched-outline__notch">
                            <label for="email-text-field" class="mdc-floating-label">E-Mail</label>
                          </div>
                          <div class="mdc-notched-outline__trailing"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-center mt-2">
                      <div class="mdc-text-field mdc-text-field--outlined">
                        <input class="mdc-text-field__input" id="password-text-field" type="password" minlength="8">
                        <div class="mdc-notched-outline">
                          <div class="mdc-notched-outline__leading"></div>
                          <div class="mdc-notched-outline__notch">
                            <label for="password-text-field" class="mdc-floating-label">Senha</label>
                          </div>
                          <div class="mdc-notched-outline__trailing"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-center mt-2">
                      <div class="mdc-text-field mdc-text-field--outlined">
                        <input class="mdc-text-field__input" id="password-confirmation-text-field" type="password" minlength="8">
                        <div class="mdc-notched-outline">
                          <div class="mdc-notched-outline__leading"></div>
                          <div class="mdc-notched-outline__notch">
                            <label for="password-confirmation-text-field" class="mdc-floating-label">Confirme sua senha</label>
                          </div>
                          <div class="mdc-notched-outline__trailing"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button class="mdc-button mdc-button--raised">
                  <span class="mdc-button__label">Registrar</span>
                </button>
                <button class="mdc-button mdc-button--raised">
                  <span class="mdc-button__label">Fechar</span>
                </button>
              </div>
            </div>
          </div>
        </div>

  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('js/config.js')}}"></script>
  @yield('scripts')
</body>
</html>
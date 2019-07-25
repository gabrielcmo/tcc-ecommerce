<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{asset('css/config.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  @yield('stylesheets')
  <script src="https://kit.fontawesome.com/828f671aa2.js"></script>
</head>
<body>
        <header class="mdc-top-app-bar mdc-top-app-bar--fixed" id="topAppBar">
          <div class="mdc-top-app-bar__row">
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
              <button class="material-icons mdc-icon-button mdc-top-app-bar__navigation-icon d-none" id="sidebarMenuButton">menu</button>
              <span class="mdc-top-app-bar__title">Teste</span>       
            </section>
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar" style="margin-right: 5%;">
              <div class="mdc-menu-surface--anchor" id="allMenu">
                <button class="mdc-button mdc-top-app-bar__action-item" id="menuButton">
                  <i class="material-icons mdc-button__icon" aria-hidden="true" style="font-size: 22px; margin-top: -6px">person</i>  
                  <span class="mdc-button__label">Entrar</span>
                </button> 
                <div class="mdc-menu mdc-menu-surface" id="menu">
                    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
                        <li class="mdc-list-item" role="menuitem">
                          <span class="mdc-list-item__text">Logar</span>
                        </li>
                        <li class="mdc-list-item" role="menuitem">
                          <span class="mdc-list-item__text">Registrar</span>
                        </li>
                        <li class="mdc-list-divider" role="separator"></li>
                        <li class="mdc-list-item" role="menuitem">
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
            <button class="mdc-button mdc-button--raised" style="position:absolute; bottom: 45px; right: 0; margin-bottom: 20px; margin-right: 10px;">
              <span class="mdc-button__label">Registrar</span>
            </button>
            <button class="mdc-button mdc-button--raised" style="position:absolute; bottom: 45px; left: 0; margin-bottom: 20px; margin-left: 10px;">
              <span class="mdc-button__label">Logar</span>
            </button>
            <button class="mdc-button mdc-button--raised" style="position:absolute; bottom: 0; width: 235px; margin-right: 10px; margin-left: 10px; margin-bottom: 20px">
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




  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('js/config.js')}}"></script>
  @yield('scripts')
</body>
</html>
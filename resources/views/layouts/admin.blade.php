<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>

  <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/828f671aa2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{asset('/css/general.css')}}">
  @yield('stylesheets')
</head>

<body style="background-color: white;">

  <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
    @csrf
  </form>

  <header class="mdc-top-app-bar mdc-top-app-bar--fixed" id="admin-topAppBar" style="background-color: #D7CEC7;">
    <div class="mdc-top-app-bar__row">
      <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
        <button class="material-icons mdc-icon-button mdc-top-app-bar__navigation-icon d-none"
          id="admin-sidebarMenuButton">menu</button>
        <span class="mdc-top-app-bar__title">Painel de controle</span>
      </section>
      <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
        <a class="mdc-button mdc-button--raised general-button mr-2" href="{{route('landing')}}" id="adminBackButton">
          <span class="mdc-button__label">Voltar para o site</span>
        </a>
        <button class="mdc-button mdc-button--raised general-button mr-4"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit()" id="logout-button">
          <span class="mdc-button__label">Sair</span>
        </button>
      </section>
    </div>
  </header>

  <aside class="mdc-drawer mdc-drawer--modal d-none" id="admin-sidebarMenu">
    @auth
    <div class="mdc-drawer__header">
      <h3 class="mdc-drawer__title">{{ Auth::user()->name }}</h3>
      <h6 class="mdc-drawe__subtitle">{{ Auth::user()->email }}</h6>
    </div>
    @endauth
    <div class="mdc-drawer__content" style="position: relative;">
      @auth
      <div class="mdc-list">
        <a class="mdc-list-item mdc-list-item--activated" href="#graphics">
          <i class="material-icons mdc-list-item__graphic" aria-hidden="true">show_chart</i>
          <span class="mdc-list-item__text">Gráfico de Vendas</span>
        </a>
        <a class="mdc-list-item" href="#products">
          <i class="material-icons mdc-list-item__graphic" aria-hidden="true">show_chart</i>
          <span class="mdc-list-item__text">Lista de produtos</span>
        </a>
        <a class="mdc-list-item" href="#orders">
          <i class="material-icons mdc-list-item__graphic" aria-hidden="true">show_chart</i>
          <span class="mdc-list-item__text">Lista de pedidos</span>
        </a>
        <a class="mdc-list-item" href="#cupons">
          <i class="material-icons mdc-list-item__graphic" aria-hidden="true">show_chart</i>
          <span class="mdc-list-item__text">Lista de cupons</span>
        </a>
        <a class="mdc-list-item" href="#suport">
          <i class="material-icons mdc-list-item__graphic" aria-hidden="true">show_chart</i>
          <span class="mdc-list-item__text">Suporte</span>
        </a>
      </div>
      @endauth
      <button class="mdc-button mdc-button--raised general-button mr-2"
        style="position: absolute; bottom: 10px; right: 0;"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
        <span class="mdc-button__label">Sair</span>
      </button>
    </div>
  </aside>
  <div class="mdc-drawer-scrim"></div>
  @if (Request::is('admin'))
  <div class="mdc-top-app-bar--fixed-adjust">
    <main id="main-content">
      <div class="mdc-tab-bar" role="tablist" id="tablist">
        <div class="mdc-tab-scroller">
          <div class="mdc-tab-scroller__scroll-area">
            <div class="mdc-tab-scroller__scroll-content">
              <a class="mdc-tab mdc-tab--active" id="graphics-tab" data-toggle="tab" href="#graphics" role="tab"
                aria-controls="graphics" aria-selected="true" tabindex="0">
                <span class="mdc-tab__content">
                  <span class="mdc-tab__icon material-icons" aria-hidden="true">show_chart</span>
                  <span class="mdc-tab__text-label">Gráfico de vendas</span>
                </span>
                <span class="mdc-tab-indicator mdc-tab-indicator--active">
                  <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                </span>
                <span class="mdc-tab__ripple"></span>
              </a>
              <a class="mdc-tab" id="products-tab" data-toggle="tab" href="#products" role="tab"
                aria-controls="products" aria-selected="false" tabindex="0">
                <span class="mdc-tab__content">
                  <span class="mdc-tab__icon material-icons" aria-hidden="true">show_chart</span>
                  <span class="mdc-tab__text-label">Lista de produtos</span>
                </span>
                <span class="mdc-tab-indicator">
                  <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                </span>
                <span class="mdc-tab__ripple"></span>
              </a>
              <a class="mdc-tab" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders"
                aria-selected="false" tabindex="0">
                <span class="mdc-tab__content">
                  <span class="mdc-tab__icon material-icons" aria-hidden="true">show_chart</span>
                  <span class="mdc-tab__text-label">Lista de pedidos</span>
                </span>
                <span class="mdc-tab-indicator">
                  <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                </span>
                <span class="mdc-tab__ripple"></span>
              </a>
              <a class="mdc-tab" id="cupons-tab" data-toggle="tab" href="#cupons" role="tab" aria-controls="cupons"
                aria-selected="false" tabindex="0">
                <span class="mdc-tab__content">
                  <span class="mdc-tab__icon material-icons" aria-hidden="true">show_chart</span>
                  <span class="mdc-tab__text-label">Lista de cupons</span>
                </span>
                <span class="mdc-tab-indicator">
                  <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                </span>
                <span class="mdc-tab__ripple"></span>
              </a>
              <a class="mdc-tab" id="suporte-tab" data-toggle="tab" href="#suporte" role="tab" aria-controls="suporte" aria-selected="false" tabindex="0">
                <span class="mdc-tab__content">
                  <span class="mdc-tab__icon material-icons" aria-hidden="true">show_chart</span>
                  <span class="mdc-tab__text-label">Suporte</span>
                </span>
                <span class="mdc-tab-indicator">
                  <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                </span>
                <span class="mdc-tab__ripple"></span>
              </a>
            </div>
          </div>
    @endif
      <div class="container">
        @if(Session::has('status'))
        <br>
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
        
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        
        @if (Request::is('admin'))
          <div class="tab-content mt-3">
            <div id="graphics" class="tab-pane fade show active" role="tabpanel" aria-labelledby="graphics-tab">
              @include('admin.index')
            </div>
            <div id="products" class="tab-pane fade" role="tabpanel" aria-labelledby="products-tab">
              @include('admin.products')
            </div>
            <div id="orders" class="tab-pane fade" role="tabpanel" aria-labelledby="orders-tab">
              @include('admin.orders')
            </div>
            <div id="cupons" class="tab-pane fade" role="tabpanel" aria-labelledby="cupons-tab">
              @include('admin.cupons')
            </div>
            <div id="suporte" class="tab-pane fade" role="tabpanel" aria-labelledby="suporte-tab">
              @include('admin.support')
            </div>
          </div>
        @endif
        @if (!Request::is('admin'))
          <br><br><br>
          <a href="{{ URL::previous() }}" style="decoration: none; font-size: 1.1em"><--- Voltar</a><br><br>
          @yield('content')
        @endif
      </div>
    </main>
  </div>




  <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
  <script src="{{asset('js/customJs/admin_layout.js')}}"></script>
  @yield('scripts')
</body>
</html>
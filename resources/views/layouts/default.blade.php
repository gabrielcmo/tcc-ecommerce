<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{asset('css/config.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/css/uikit.min.css" />
  @yield('styles')
</head>
<body>
  <header class="mdc-top-app-bar mdc-top-app-bar--short">
    <div class="mdc-top-app-bar__row">
      <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
        <a class="material-icons mdc-top-app-bar__navigation-icon">menu</a>
        <span class="mdc-top-app-bar__title">Teste</span>         
      </section>
      <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
        <form class="form-inline">
          <input class="form-control mr-sm-2 col-lg-12" id="search" type="search" placeholder="Pesquise por produtos!" aria-label="search">
        </form>
        <div class="dropdown-menu" aria-labelledby="search" id="result">
        </div>
        <a class="material-icons mdc-top-app-bar__action-item" href="#modal-sections" aria-label="Shopping cart" uk-toggle>
          shopping_cart
        </a>
        @if(Cart::count() > 0)
          <span class="badge badge-light"><strong>{{ Cart::count() }}</strong></span>
        @endif
      </section>
    </div>
  </header>
        
  <aside class="mdc-drawer mdc-drawer--modal">
    <div class="mdc-drawer__content">
      <div class="mdc-list">
        @auth
          <a class="mdc-list-item mdc-list-item--activated" href="{{ route('perfil') }}" aria-current="page">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">inbox</i>
            <span class="mdc-list-item__text">{{Auth::guard()->user()->name}}</span>
          </a>
          <a class="mdc-list-item" href="{{ route('admin.index') }}">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">send</i>
            <span class="mdc-list-item__text">Painel de administração</span>
          </a>
          <a class="mdc-list-item" href="{{ route('orders') }}">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">drafts</i>
            <span class="mdc-list-item__text">Pedidos</span>
          </a>
          <a class="mdc-list-item" href="{{ route('historic') }}">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">drafts</i>
            <span class="mdc-list-item__text">Histórico</span>
          </a>
          <a class="mdc-list-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">drafts</i>
            <span class="mdc-list-item__text text-danger">Sair</span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </a>
        @else
          <a class="mdc-list-item" href="{{ route('login') }}">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">drafts</i>
            <span class="mdc-list-item__text">Login</span>
          </a>
          <a class="mdc-list-item" href="{{ route('register') }}">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">drafts</i>
            <span class="mdc-list-item__text">Registrar</span>
          </a>
        @endif
      </div>
    </div>
  </aside>

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

  <div class="mdc-drawer-scrim"></div>
  
  <div class="mdc-top-app-bar--short-fixed-adjust">     
    <main class="main-content" id="main-content">
      <div class="container">
        <br>
        
        @yield('content')
      </div>
    </main>
  </div>

  <div id="modal-sections" uk-modal>
      <div class="uk-modal-dialog uk-width-auto">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Carrinho</h2>
        </div>
        <div class="uk-modal-body">
          @include('user.cart')
        </div>
      </div>
    </div>

  <!-- JQuery -->
  <script type="text/javascript" src="/js/app.js"></script>
  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('js/config.js')}}"></script>
  <!-- UIkit JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit-icons.min.js"></script>
  <script>
    $(document).ready(function(){
      function fetch_data(query = ''){
        $.ajax({
          url: "{{ route('search') }}",
          method: 'GET',
          data: {query:query},
          success:function(result){
            $('#result').fadeIn();
            $('#result').html(result);
          }
        });
      }
      $('#search').keyup(function(){
        var query = $(this).val();            
        fetch_data(query);
      });
    });
  </script>
  @yield('scripts')
</body>
</html>
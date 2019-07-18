<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" >
  <link href="{{ asset('/css/styleDefault.min.css') }}" rel="stylesheet" >

  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/css/mdb.min.css" rel="stylesheet">
  
  @yield('stylesheets')
  
  <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar shadow rounded navbar-expand-lg navbar-light" style="background-color: #f3f2f1;">
      <a class="navbar-brand" href="{{ route('landing') }}"><img src="{{ asset('/img/doomus.png') }}" width="130px" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <div class="dropdown my-2 my-lg-0 mx-5 w-75">
            <form class="form-inline">
                <input class="form-control mr-sm-2 col-lg-12" id="search" type="search" placeholder="Pesquise por produtos!" aria-label="Search">
              </form>
              <div class="dropdown-menu" aria-labelledby="search" id="result">
              </div>
        </div>
        <ul class="navbar-nav">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle mx-4 mr-2" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('perfil') }}">Perfil</a>
                @if(Auth::user()->role_id == 1)
                  <a class="dropdown-item" href="{{ route('admin.index') }}">Painel de controle</a>
                @endif
                <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    {{ __('Sair') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </div>
            </li>
          @endauth
          @guest
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mx-4 mr-2" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i> olá, entre com sua conta ou cadastre-se
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
              <a class="dropdown-item" href="{{ route('register') }}">
                  {{ __('Registrar') }}
              </a>
            </div>
          </li>
          @endguest
        </ul>
      </div>
      <a class="btn btn-info mx-2 mr-2" href="{{ route('user.cart') }}"><i class="fas fa-shopping-cart"></i>
        @if(Cart::count() > 0)
          <span class="badge badge-light">{{ Cart::count() }}</span>
        @endif
      </a>
    </nav>
    <nav class="navbar shadow bg-dark rounded navbar-expand-lg navbar-dark" style="background-color: #f3f2f1;">
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mx-4 mr-2" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Nossas categorias
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="">Cama</a>
              <a class="dropdown-item" href="">Mesa</a>
              <a class="dropdown-item" href="">Banho</a>
            </div>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">Oferta <strong style='color:red;'>BOOM</strong></a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">Novidades</a>
          </li>
        </ul>
      </div>
    </nav>
    <br>
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
    
    @yield('other-contents')

    <!-- Main layout -->
    <main>
    
      @yield('content')

    </main>
    <!-- /Main layout -->

    <!-- Footer -->
    <footer class="footer">
      <div class="row">
        <div class="col-md-6">
          <h4>Nossas redes socias</h4>
          <a href="https://facebook.com.br/doomus">Facebook</a>&nbsp;
          <a href="https://instagram.com.br/doomus">Instagram</a>
        </div>
        <div class="col-md-6">
          <h4>Fale conosco</h4>
          suporte@doomus.com
        </div>
      </div>
      Copyright &copy; 2019. Doomus.
    </footer>
    <!-- /Footer -->

    <!-- SCRIPTS -->

      <!-- JQuery -->
      <script type="text/javascript" src="/js/app.js"></script>

      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>

      <!-- Bootstrap core JavaScript -->
      {{-- <script type="text/javascript" src="/js/bootstrap.min.js"></script> --}}

      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/js/mdb.min.js"></script>

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
    
    <!-- SCRIPTS -->
</body>
</html>
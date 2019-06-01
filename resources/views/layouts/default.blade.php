<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" >

    @yield('stylesheets')

    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
      <a class="navbar-brand" href="{{ route('landing') }}"><img src="{{ asset('/img/doomus.png') }}" width="130px" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <form class="form-inline my-2 my-lg-0 mx-5 w-75">
          <input class="form-control mr-sm-2 col-lg-12" id="search" type="search" placeholder="Pesquise por produtos, temos muitos!" aria-label="Search">
        </form>
        <div class="dropdown-menu" aria-labelledby="search" id="result">
        </div>
        <ul class="navbar-nav">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle mx-4 mr-2" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('perfil') }}">Perfil</a>
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

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
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
    <br>
    
    @yield('other-contents')

    <!-- Main layout -->
    <main>


    
      @yield('content')

    </main>
    <!-- /Main layout -->

    <!-- Footer -->
    <footer>
      
    </footer>
    <!-- /Footer -->

    <!-- SCRIPTS -->

      <!-- JQuery -->
      <script type="text/javascript" src="/js/jquery.min.js"></script>

      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="/js/bootstrap.min.js"></script>

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
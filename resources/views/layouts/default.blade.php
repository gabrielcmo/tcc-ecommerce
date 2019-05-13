<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" >
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  
  @yield('stylesheets')

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container">
  
        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="{{ route('landing') }}">
          <strong class="blue-text">Doomus</strong>
        </a>
  
        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a class="nav-link waves-effect" role="button" aria-haspopup="true" aria-expanded="false">
                  Nossos departamentos
                </a>
              </li>

            <li class="nav-item">
              <a class="nav-link waves-effect" href="#" target="_blank">About MDB</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#" target="_blank">Free download</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#" target="_blank">Free tutorials</a>
            </li>
          </ul>
  
          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a class="nav-link waves-effect btn" href="{{ route('user.cart') }}">
                <i class="fas fa-shopping-cart"></i>
                <span class="clearfix d-none d-sm-inline-block"> Carrinho </span>&nbsp;
                <?php $cart_count = Cart::count(); ?>
                @if($cart_count > 0)
                  <span class="badge badge-light">{{ $cart_count }}</span>
                @endif
              </a>

            </li>
            @guest
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                  <a class="dropdown-item" href="{{ route('login')  }}">Login</a>
                  <a class="dropdown-item" href="{{ route('register')  }}">Registro</a>
              </div>
            </li>
            @else
            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <i class="fas fa-user"></i>{{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
    <!-- /Navbar -->

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
  <script type="text/javascript" src="js/jquery.min.js"></script>

  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>

  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#menu-products').hover(function () {
        $('#menu').show();
      },
      function () {
        $('#menu').hide();
      });
    });
  </script>

  @yield('scripts')

  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
    @yield('animations')
  </script>
</body>
</html>
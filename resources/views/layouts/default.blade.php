<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" >

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">

    @yield('stylesheets')
    
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <!-- Navbar content -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="#">Doomus</a>

          <div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </div>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-home"></i> Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-list"></i> Categorias</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-newspaper"></i> Sobre</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            </form>

            <div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="nav-item">
                <a class="nav-link" href=""><i class="fas fa-shopping-cart"></i>
                  @if(Cart::count() > 0)
                      <span class="badge badge-light">{{ Cart::count() }}</span>
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

            <div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>

          </div>
    </nav>

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

      @yield('scripts')
    
    <!-- SCRIPTS -->
</body>
</html>
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
              <div class="dropdown show" id="menu-products">
                <a class="btn btn-primary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Nossos produtos
                </a>

                <div class="dropdown-menu text-center" id="menu" aria-labelledby="dropdownMenuLink">
                  <a class="btn btn-secondary dropdown-toggle dropdown-item" href="#">Cozinha</a>
                  <a class="btn btn-secondary dropdown-toggle dropdown-item" href="#">Banheiro</a>
                  <a class="btn btn-secondary dropdown-toggle dropdown-item" href="#">Sala</a>
                </div>
              </div>
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
                <span class="clearfix d-none d-sm-inline-block"> Cart </span>&nbsp;
                @auth
                  @if(Request::segment(1) == null)
                    <span class="badge badge-light">{{ count($cart_products) }}</span>
                  @endif
                @endauth
              </a>

            </li>   
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i></a>
              <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                  <form class="px-4 py-3">
                    <div class="form-group">
                      <label for="exampleDropdownFormEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                    </div>
                    <div class="form-group">
                      <label for="exampleDropdownFormPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="dropdownCheck">
                      <label class="form-check-label" for="dropdownCheck">
                        Remember me
                      </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                  </form>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">New around here? Sign up</a>
                  <a class="dropdown-item" href="#">Forgot password?</a>
              </div>
            </li>        
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
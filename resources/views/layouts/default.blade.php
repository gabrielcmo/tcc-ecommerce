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
<body ng-app="search">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <!-- Navbar content -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="{{ route('landing') }}"><img src="{{ asset('/img/doomus.png') }}" width="130px" alt=""></a>

          <div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </div>

          <div class="collapse navbar-collapse" id="navbarToggler">
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
              <input type="text" id="search" name="search" class="form-control" placeholder="Pesquise aqui.." autocomplete="off"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="dropdown-menu" aria-labelledby="search" id="record">
              <span id="total_records"></span>
            </div>
            <div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('user.cart') }}"><i class="fas fa-shopping-cart"></i>
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
                <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('login')  }}">Login</a>
                    <a class="dropdown-item" href="{{ route('register')  }}">Registro</a>
                </div>
              </li>
              @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fas fa-user"></i>&nbsp; {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('perfil') }}">Perfil</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
              </li>
              @endguest
          </ul>

            <div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>

          </div>
    </nav><br>

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

       <!-- AJAX  -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

      <script>
        $(document).ready(function(){
          function fetch_data(query = ''){
            $.ajax({
              url: "{{ route('search') }}",
              method: 'GET',
              data: {query:query},
              dataType: 'json',
              success:function(data){
                $('#record').html(data.ul_data);
                $('#total_records').text(data.ul_total);
              }
            });
          }

          $(document).on('keyup', '#search', function(){
            var query = $(this).val();

            fetch_data(query);
          });
        });
      </script>
      
      @yield('scripts')
    
    <!-- SCRIPTS -->
</body>
</html>
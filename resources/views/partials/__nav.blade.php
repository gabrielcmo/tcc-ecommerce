<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand waves-effect" href="{{ route('index') }}">
                <strong class="blue-text">Doomus</strong>
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link waves-effect" href="/">Home
                        <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">
                    @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link waves-effect">
                                    <span class="badge red z-depth-1 mr-1"> 1 </span>
                                    <i class="fas fa-shopping-cart"></i>
                                    <span class="clearfix d-none d-sm-inline-block"> Carrinho </span>
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link waves-effect" href="{{ url('/login') }}">Login</a>
                                </li>

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link waves-effect" href="{{ url('/register') }}">Cadastre-se</a>
                                    </li>
                                @endif
                            @endauth
                    @endif
                </ul>

            </div>

        </div>
</nav>
<!-- Navbar -->
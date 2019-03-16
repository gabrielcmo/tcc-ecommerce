<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/anime.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Fonts -->
    {{-- <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' type='text/css'> --}}
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ourStyle.css') }}" rel="stylesheet">
{{-- 
    <style>
    .ml15 {
        font-weight: 1000;
        font-size: 2em;
        text-transform: uppercase;
        letter-spacing: 0.5em;
    }

    .ml15 .word {
        display: inline-block;
        line-height: 1em;
    }

    .top-page{
        width: 100%;
        height: 50px;
    }
    </style> --}}
</head>
<body>
{{-- 
    <div class="top-page">
        <h1 class="ml15 px-2 py-2">
            <span class="word">Frete grátis</span>
            <span class="word">na primeira compra</span>
        </h1>
    </div> --}}

    <script>
        anime.timeline({loop: true})
        .add({
            targets: '.ml15 .word',
            scale: [14,1],
            opacity: [0,1],
            easing: "easeOutCirc",
            duration: 800,
            delay: function(el, i) {
            return 800 * i;
            }
        }).add({
            targets: '.ml15',
            opacity: 0,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 5000
        });
    </script>

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img width="30px" height="30px" src="{{ asset('images/logo.png') }}" alt="Logo">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Minha conta <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right px-4 py-3" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('login') }}">
                                        {{ __('Entrar') }}</a>

                                    @if (Route::has('register'))
                                        <a class="dropdown-item" href="{{ route('register') }}">
                                            {{ __('Novo por aqui? Registre-se') }}</a>
                                    @endif
                                </div>
                        </li>
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('profile') }}">Perfil</a>

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

    <div>
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer">

        <!-- Copyright -->
        <div class="">
            <strong>© 2019 Copyright; Todos os direitos reservados.</strong>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

</body>
</html>

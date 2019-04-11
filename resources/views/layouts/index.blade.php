<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/application.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="images/favicon.png" width="25px" height="25px" alt="Logo">&nbsp;&nbsp;{{ config('app.name') }}
        </a>
    </nav>

    <main class="px-3 py-4">
        @yield('content')

        <div class="row">
            <div class="col-md-3">
                @yield('categories')
            </div>
            <div class="col-md-9">
                @yield('products')
            </div>
        </div>
    </main>
    <script>
        $(".card").hover(function () {
            $(this).find('.card-hover').fadeIn(100);
        },
        function () {
            $(this).find('.card-hover').fadeOut(100);
        });
    </script>
</body>
</html>

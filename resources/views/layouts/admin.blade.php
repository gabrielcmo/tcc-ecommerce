<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" >
</head>
<body>
    <nav class="navbar navbar-light">
        <a class="navbar-brand" href="">Doomus - Painel de controle</a>
        <div class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">Home</a>
            <a class="nav-link" href="{{ route('admin.products') }}">Produtos</a>
            <a class="nav-link" href="{{ route('admin.orders') }}">Pedidos</a>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
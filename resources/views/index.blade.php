@extends('layouts/default')

@section('title', 'Home')

@section('stylesheets')
  <link rel="stylesheet" href="css/styleHome.css">
  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 60vh;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

  </style>
@endsection

@section('other-contents')
  <!--Carousel Wrapper-->
  <div id="carousel-example-1z" class="carousel slide carousel-fade pt-4" data-ride="carousel">

      <!--Indicators-->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
        <li data-target="#carousel-example-1z" data-slide-to="2"></li>
      </ol>
      <!--/.Indicators-->
  
      <!--Slides-->
      <div class="carousel-inner" role="listbox">
  
        <!--First slide-->
        <div class="carousel-item active">
          <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%282%29.jpg'); background-repeat: no-repeat; background-size: cover;">
  
            <!-- Mask & flexbox options-->
            <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
  
              <!-- Content -->
              <div class="text-center white-text mx-5 wow fadeIn">
                <h1 class="mb-4">
                  <strong>Learn Bootstrap 4 with MDB</strong>
                </h1>
  
                <p>
                  <strong>Best & free guide of responsive web design</strong>
                </p>
  
                <p class="mb-4 d-none d-md-block">
                  <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and
                    written versions
                    available. Create your own, stunning website.</strong>
                </p>
  
                <a target="_blank" href="https://mdbootstrap.com/education/bootstrap/" class="btn btn-outline-white btn-lg">Start
                  free tutorial
                  <i class="fas fa-graduation-cap ml-2"></i>
                </a>
              </div>
              <!-- Content -->
  
            </div>
            <!-- Mask & flexbox options-->
  
          </div>
        </div>
        <!--/First slide-->
  
        <!--Second slide-->
        <div class="carousel-item">
          <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%283%29.jpg'); background-repeat: no-repeat; background-size: cover;">
  
            <!-- Mask & flexbox options-->
            <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
  
              <!-- Content -->
              <div class="text-center white-text mx-5 wow fadeIn">
                <h1 class="mb-4">
                  <strong>Learn Bootstrap 4 with MDB</strong>
                </h1>
  
                <p>
                  <strong>Best & free guide of responsive web design</strong>
                </p>
  
                <p class="mb-4 d-none d-md-block">
                  <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and
                    written versions
                    available. Create your own, stunning website.</strong>
                </p>
  
                <a target="_blank" href="https://mdbootstrap.com/education/bootstrap/" class="btn btn-outline-white btn-lg">Start
                  free tutorial
                  <i class="fas fa-graduation-cap ml-2"></i>
                </a>
              </div>
              <!-- Content -->
  
            </div>
            <!-- Mask & flexbox options-->
  
          </div>
        </div>
        <!--/Second slide-->
  
        <!--Third slide-->
        <div class="carousel-item">
          <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%285%29.jpg'); background-repeat: no-repeat; background-size: cover;">
  
            <!-- Mask & flexbox options-->
            <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
  
              <!-- Content -->
              <div class="text-center white-text mx-5 wow fadeIn">
                <h1 class="mb-4">
                  <strong>Learn Bootstrap 4 with MDB</strong>
                </h1>
  
                <p>
                  <strong>Best & free guide of responsive web design</strong>
                </p>
  
                <p class="mb-4 d-none d-md-block">
                  <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and
                    written versions
                    available. Create your own, stunning website.</strong>
                </p>
  
                <a target="_blank" href="https://mdbootstrap.com/education/bootstrap/" class="btn btn-outline-white btn-lg">Start
                  free tutorial
                  <i class="fas fa-graduation-cap ml-2"></i>
                </a>
              </div>
              <!-- Content -->
  
            </div>
            <!-- Mask & flexbox options-->
  
          </div>
        </div>
        <!--/Third slide-->
  
      </div>
      <!--/.Slides-->
  
      <!--Controls-->
      <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <!--/.Controls-->
  
    </div>
    <!--/.Carousel Wrapper-->
  
@endsection

@section('content')
  <div class="container-flex">
    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif

    <div class="container">
      <br/>
      <div class="row">
        @foreach($products as $product)
          <div class="col-md-3 card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title"> <strong>Nome:</strong> {{ $product->name }}</h5> <br/>
              <p class="card-text"> <strong>Descrição:</strong> {{ $product->details }}</p> <br/>
              <a class="btn btn-brown" href="/user/carrinho/{{ $product->id }}/add">Adicionar ao carrinho</a> <br>
            </div>
          </div>
          <div class="m-2"></div>
        @endforeach
      </div>
    </div>

    {{ debug($products, $categories) }}
  </div>
@endsection

@section('scripts')

@endsection
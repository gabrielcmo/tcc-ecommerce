@extends('layouts.index')

@section('content')
    <div id="carouselOfProducts" class="carousel slide px-3 py-3" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100 img-fluid" src="{{ asset('images/1-carousel.jpg') }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/2-carousel.jpg') }}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/3-carousel.jpg') }}" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselOfProducts" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselOfProducts" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="row px-3 py-3">
        <div class="col-md-3 font">
            <h3>Categorias</h3>
            
            <hr>
            <h3>Descontos</h3>

            <hr>
            <h3>Marcas</h3>

            <hr>
        </div>
        <div class="col-md-9 font">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem voluptates repellendus, ab eveniet, perferendis magni totam exercitationem doloribus rerum ducimus sequi atque quas. Quo rem doloremque, magni possimus eveniet ad!</p>
        </div>
    </div>
@endsection
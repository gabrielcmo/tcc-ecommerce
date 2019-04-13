@extends('layouts.index')

@section('carousel')
<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade pt-4" data-ride="carousel">

<!--Indicators-->
<ol class="carousel-indicators">
  <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
  <li data-target="#carousel-example-1z" data-slide-to="1"></li>
</ol>
<!--/.Indicators-->

<!--Slides-->
<div class="carousel-inner" role="listbox">

  <!--First slide-->
  <div class="carousel-item active">
    <div class="view" style="background-repeat: no-repeat; background-size: cover;">
      <img src="{{ asset('img/carousel/carousel-1.jpg') }}" alt="">

      <!-- Mask & flexbox options-->
      <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

        <!-- Content -->
        <div class="text-center white-text mx-5 wow fadeIn">
          <h1 class="mb-4">
            <strong>Os melhores produtos para decorar sua casa</strong>
          </h1>

          <p>
            <strong>Preço bom e satisfação 100%</strong>
          </p>

          <p class="mb-4 d-none d-md-block">
            <strong>Com uma imensa variedade de escolha, você pode se sentir a vontade para comprar o que quiser, pelo melhor preço!</strong>
          </p>

          <a target="_blank" href="../products/3" class="btn btn-outline-white btn-lg">Ver decorações
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
    <div class="view" style="background-repeat: no-repeat; background-size: cover;">
      <img src="{{ asset('img/carousel/carousel-2.jpg') }}" alt="">

      <!-- Mask & flexbox options-->
      <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

        <!-- Content -->
        <div class="text-center white-text mx-5 wow fadeIn">
          <h1 class="mb-4">
            <strong>Toalhas</strong>
          </h1>

          <p>
            <strong>Leve o que quiser, a hora é agora!</strong>
          </p>

          <p class="mb-4 d-none d-md-block">
            <strong>Não perca tempo, tome banho e se seque com a toalhas mais macias e mais baratas do mercado</strong>
          </p>

          <a target="_blank" href="../products/5" class="btn btn-outline-white btn-lg">Ver toalhas
            <i class="fas fa-graduation-cap ml-2"></i>
          </a>
        </div>
        <!-- Content -->

      </div>
      <!-- Mask & flexbox options-->

    </div>
  </div>
  <!--/Second slide-->
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

@section('categories')
    @foreach($categories as $category)
      <?php $id_category = isset($_GET['category_id']) ? $_GET['category_id'] : null; ?>
        @if($category->id == $id_category)
          <li class="nav-item active">
              <a class="nav-link" href="#">{{ $category->name }}
                <span class="sr-only">(current)</span>
              </a>
          </li>
        @else
          <li class="nav-item">
              <a class="nav-link" href="../products/{{ $category->id }}?all=false&category_id={{$category->id}}">{{ $category->name }}</a>
          </li>
        @endif
    @endforeach
@endsection

@section('products')
  <?php $qtd = 0;

  foreach($products as $product){
    if($qtd == 20){
      break;
    }
    $qtd++; ?>

    <!--Grid column-->
    <div class="col-lg-3 col-md-6 mb-4 d-flex align-content-around flex-wrap">

      <!--Card-->
      <div class="card">

      <!--Card image-->
      <div class="view overlay" style="height:300px;">
          <img src="{{ asset('img/products/placeholder-1.jpg') }}" class="card-img-top" alt="">
          <a>
          <div class="mask rgba-white-slight"></div>
          </a>
      </div>
      <!--Card image-->

      <!--Card content-->
      <div class="card-body text-center" style="height:400px;">
          <!--Category & Title-->
          <a href="" class="grey-text">
          <h5>{{ $product->name }}</h5>
          </a>
          <h5>
          <strong>
              <a href="" class="dark-grey-text">R${{$product->value}}</a>
          </strong>
          </h5>

          <h4 class="font-weight-bold blue-text">
          <strong>{{$product->description}}</strong>
          </h4>

      </div>
      <!--Card content-->

      </div>
      <!--Card-->
    </div>
    <!--Grid column-->
  <?php } ?>
@endsection

@section('pagination')
  <?php
  $number_pg = 1;
  $numero_de_paginacoes = ceil($_POST["total_products"]/21);
  $number_pg_get = isset($_GET['number_pg']) ? $_GET['number_pg'] : null;
  ?>
  @for($i = 1; $i <= $numero_de_paginacoes; $i++)
    @if($number_pg == 1 && $number_pg_get == null)
      <li class="page-item active">
        <a class="page-link" href="#">{{$number_pg}}</a>
      </li>
    @elseif($number_pg == 1)
      <li class="page-item">
        <a class="page-link" href="../">{{$number_pg}}</a>
      </li>
    @else
        @if($number_pg == $number_pg_get)
          <li class="page-item active">
            <a class="page-link" href="#">{{$number_pg}}
              <span class="sr-only">(current)</span>
            </a>
          </li>
        @else
          <li class="page-item">
            <a class="page-link" href="../{{ $number_pg }}?id_last_product={{ (($number_pg-1)*20) }}&number_pg={{$number_pg}}">{{$number_pg}}</a>
          </li>
        @endif
    @endif
    <?php $number_pg++; ?>
  @endfor
@endsection
@extends('layouts.default')

@section('title')
    {{ $product->name }}
@endsection

@section('content')

<script>
{
  "@context": "http://schema.org/"
  ,
    "@type": "Product",
    "name": "DualShock Controller for PlayStation 4",
    "url": "https://bootstrap.jumpseller.com/ps4",
    "itemCondition": "http://schema.org/NewCondition",
    
    "image": "https://images.jumpseller.com/store/bootstrap/224303/Screenshot_2.jpg?1439530709",
    
    "description": "The DualShock®4 Wireless Controller for PlayStation®4 defines the next generation of play, combining revolutionary new features with intuitive, precision controls. Improved analog sticks and trigger buttons allow for unparalleled accuracy with every move while innovative new technologies such as the multi-touch, clickable touch pad, integrated light bar, and internal speaker offer exciting new ways to experience and interact with your games. And with the addition of the Share button, celebrate and upload your greatest gaming moments on PlayStation®4 with the touch of a button.&amp;nbsp;",
    
    
      "category": CategoryDrop,
        "offers": {
      
        "@type": "Offer",
        "price": "20000.0",
        "itemCondition": "http://schema.org/NewCondition",
        
        "availability": "http://schema.org/InStock",
        
      
      "priceCurrency": "CLP",
      "seller": {
        "@type": "Organization",
        "name": "Bootstrap"
      },
      "url": "https://bootstrap.jumpseller.com/ps4"
    }
  
}
</script>

    <script src="//ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script type="text/javascript">
  WebFont.load({
    google: {
      families: ["Open Sans", "Open Sans", "Open Sans"]
    }
  });
</script>

<style type="text/css">
  body {
    
    font-family: 'Open Sans', sans-serif !important;
    

  }

  .page-header, h2 {
    
    font-family: 'Open Sans', sans-serif !important;
    
  }

  .navbar-brand, .text-logo {
    
  }

   p, .caption h4, label, table, .panel  {
    font-size: 14px !important;
  }

  h2 {
    font-size: 30px !important;
  }
  .navbar-brand, .text-logo {
    font-size: 18px !important;
  }
  .navbar-left a {
    font-size: 14px !important;
  }

</style>

  
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-12220401-1');
  ga('set', 'anonymizeIp', true);
  ga('send', 'pageview');

  

  
</script>

<script src="/javascripts/dist/jumpseller-2.0.0.js?1558543326" type="text/javascript" defer="defer"></script>

</head>

  <body>

    <!--[if lt IE 8]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

    <!-- Page Content -->
    
    <section class="container">
      <div class="row">
        <section class="col-12 d-none d-md-block">
          <ol class="breadcrumb">
            
            
            <li class="breadcrumb-item"><a href="/" class="trsn" title="Go back to Home">Home</a></li>
            
            
            
            <li class="breadcrumb-item"><span>{{ $product->name }}</span></li>
            
            
          </ol>
        </section>
      </div>
    </section>
    

    <div class="container">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-12">
      <h1 class="page-header">{{ $product->name }}</h1>
    </div>
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-6 mb-4">
      
      <!-- There's only One image -->
      <div class="">
        @foreach($product->image as $image)
          <div class="main-product-image">
            <img src="/img/products/{{$image->filename}}" alt="DualShock Controller for PlayStation 4" class="img-fluid">
          </div>
        @endforeach
      </div>
      
    </div>

    <div class="col-lg-6">
      <form class="form-horizontal" action="/cart/add/224303" method="post" enctype="multipart/form-data" name="buy">

          <!-- Product Price  -->
          <div class="form-group price_elem row">
            <label class="col-sm-3 col-md-3 form-control-label nopaddingtop">Preço:</label>
            <div class="col-sm-8 col-md-9">
              <span class="product-form-price" id="product-form-price">R$ {{ $product->price }}</span>
              

            </div>
          </div>

          

          

          

          <div class="form-group row">
            <label for="Quantity" class="col-sm-3 col-md-3 form-control-label">Quantity:</label>
            <div class="col-sm-8 col-md-9">
             
              <input type="number" class="qty form-control" ng-name="qty" id="input-qty" name="qty" min='1' maxlength="5" value="1" >
            </div>
          </div>

            


          <!-- Out of Stock -->
          <div class="form-group product-stock product-out-stock row hidden">
            <div class="col-sm-8 col-md-9 mx-auto">
              @if($product->qtd_last == 0)
                <span class="bg-danger btn product-form-price">Esgotado</span>
                <p>Infelizmente este produto está esgotado. Contate-nos para solitar um para você.</p>
                <a href="/contact" class="btn btn-secondary btn-sm" title="Contact Us">Contate-nos</a>
                <a href="javascript:history.back()" class="btn btn-link btn-sm" title="&larr; Ou continue comprando">&larr; Ou continue comprando</a>
              @elseif($product->qtd_last < 5)
              <span class="bg-danger btn product-form-price">Restam apenas {{ $product->qtd_last }}</span>
              @else
              <span class="bg-success btn product-form-price">Disponível</span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-md-3 form-control-label">Descrição:</label>
            <div class="col-sm-8 col-md-9 description">
              <p>{{ $product->description }}</p>
            </div>
          </div>

          
          <div class="form-group row">
            <label class="col-sm-3 col-md-3 form-control-label">Detalhes:</label>
            <div class="col-sm-9 col-md-9">
              
              <p>{{ $product->details }}</p>
              
            </div>
          </div>
          
          <div class="form-group row">
            <div class="col-sm-9 col-md-9">

              <button href="#" class="btn btn-dark" ng-click="addToCart()">Adicionar ao carrinho</button>  
              
            </div>
          </div>
      
      <script type="text/javascript">
        $('#product-sharing a').click(function(){
          return !window.open(this.href, 'Share', 'width=640,height=300');
        });
      </script>


    </div>
  </div>

  

</div>


<script type="text/javascript">
$(document).ready(function(){
  $('#product-carousel').carousel({interval: false});
  $('.thumbs').click(function(e){
    e.preventDefault();
    $("#product-carousel").carousel(parseInt($(this).attr('data-image')) -1);
  });
  $("#product-link").click(function () {
    $(this).select();
  });
});
</script>
    </div>
    <!-- /.container -->

    <!-- Css -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    

    <!-- Bootstrap Core JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- Script to Activate Tooltips -->
    <script>
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        $('.carousel').carousel()
      })
    </script>

    <script src="//cdn.jsdelivr.net/bootstrap.filestyle/1.1.0/js/bootstrap-filestyle.min.js"></script>
    <script type="text/javascript" src="https://assets.jumpseller.com/store/bootstrap/themes/186291/main.js?1556737893"></script>
    <!-- {{ debug($product) }} -->
@endsection
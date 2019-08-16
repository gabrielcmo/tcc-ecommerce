@extends('layouts.new_layout')

@section('stylesheets')
  <link href="{{ asset('/css/styleHome.css') }}" rel="stylesheet"/>
@endsection

@section('title', $product->name)

@section('content')
  <form name="addToCart" action="{{ route('cart.add') }}" method="get">
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
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">{{ $product->name }}</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 mb-4">
        <div class="">
          @foreach($product->image as $image)
            <div class="main-product-image">
              <img src="/img/products/{{$image->filename}}" alt="Product" class="img-fluid">
            </div>
          @endforeach
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group price_elem row">
          <label class="col-sm-3 col-md-3 form-control-label nopaddingtop">Preço:</label>
          <div class="col-sm-8 col-md-9">
            <span class="product-form-price" id="product-form-price">R$ {{ $product->price }}</span>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-md-3 form-control-label nopaddingtop">Avalie o produto:</label>
          <div class="col-sm-8 col-md-9">
            <form name="avaliateForm" action="{{ route('avaliate') }}" method="post">
              @csrf
              <input type="hidden" id="product_id" value="{{ $product->id }}" id="">
              <div id="rating_bar">
                <span class="fas fa-star" name="rate" value="5" id="rate_5" onclick="avaliatesubmit(this.id);"></span>
                <span class="fas fa-star" name="rate" value="4" id="rate_4" onclick="avaliatesubmit(this.id);"></span>
                <span class="fas fa-star" name="rate" value="3" id="rate_3" onclick="avaliatesubmit(this.id);"></span>
                <span class="fas fa-star" name="rate" value="2" id="rate_2" onclick="avaliatesubmit(this.id);"></span>
                <span class="fas fa-star" name="rate" value="1" id="rate_1" onclick="avaliatesubmit(this.id);"></span>
              </div>
            </form>
          </div>
        </div>
        <div class="form-group row">
          <label for="Quantity" class="col-sm-3 col-md-3 form-control-label">Quantidade:</label>
          <div class="col-sm-8 col-md-9">
            <input type="number" class="form-control{{ $errors->has('qty') ? ' is-invalid' : '' }}" name="qty" min='1' max="100" value="1" >
          </div>
          @if ($errors->has('qty'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('qty') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group product-stock product-out-stock row hidden">
          <div class="col-sm-8 col-md-9 mx-auto">
            @if($product->qtd_last == 0)
              <span class="bg-danger btn product-form-price">Esgotado</span>
              <p>Infelizmente este produto está esgotado. Contate-nos para solitar um para você.</p>
              <a href="#" class="btn btn-secondary btn-sm" title="Contact Us">Contate-nos</a>
              <a href="javascript:history.back()" class="btn btn-link btn-sm" title="&larr; Ou continue comprando">&larr; Ou continue comprando</a>
            @elseif($product->qtd_last <= 25)
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
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <div class="form-group row">
          <div class="col-sm-9 col-md-9">
            <button type="button" onclick="document.addToCart.submit();" class="btn btn-dark">Adicionar ao carrinho</button>  
          </div>
        </div>
      </div>
      </form>
      <br><br>
      <div class="col-md-12">
        <h2>Outros produtos</h2><br>
      </div>

      <?php $i = 0; ?>
      @foreach(Doomus\Product::all() as $product)
          <?php $images = $product->image; ?>
          <div class="col-md-4">
            <div class="card">
              @foreach($product->image as $image)
                @if(isset($image) && $image !== null && $image->filename !== null || $image->filename !== '')
                  <div class="card-image">
                    <img src="/img/products/{{$image->filename}}" alt="Produto" class="img-fluid">
                  </div>
                @elseif(!isset($image))  
                  <div class="card-image">
                    <img src="/img/doomus.png" alt="Produto" class="img-fluid">
                  </div>
                @endif
              @endforeach
              <h3 class="card-title">{{ $product->name }}</h3>
              <a class="btn btn-success" href="/carrinho/{{ $product->id }}/add">Adicionar ao carrinho</a><br>      
            </div>
          </div>
        <?php 
          $i++;
          if($i == 3){
            break;
          }
        ?>
      @endforeach
    </div>
  </div>
@endsection

@section('scripts')
<script>
  function avaliatesubmit(rate){

    rating = rate.charAt(5);

    $.ajax({
      type: 'post',
      url: {{ route('avaliate') }},
      header: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
      },
      data: {
        product_id: document.getElementById('product_id').value,
        rate: rating
      },
      success: function () {
        alert('form was submitted');
      }
    });
  }
</script>
@endsection
@extends('layouts.layout')

@section('title', 'Doomus - Ofertas')

@section('content')
    <div class="row">
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light col-md-12" style="background-image:url('img/banho.jpg');">
            <div class="col-md-12 p-lg-5 mx-auto my-5">
              <h1 class="display-5 font-weight-normal text-success">Todos os produtos de banho com 10% OFF!</h1>
              <p class="lead font-weight-normal" style="color:#59b864">Essa oferta expira em <div class="font-weight-bold" style="font-size:2em;color:#e72c2c;" id="time"></div></p>
              <div class="btn btn-outline-secondary" style="color:#e72c2c">Fique atento para as novidades..</div>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
          </div>
          <div class="mx-auto">
          <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
            <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden" onclick="location.href='/produto/1'">
              <div class="my-3 py-3">
                <h2 class="display-5">Toalhas de banho de seda</h2>
                <p class="lead">Você vai se secar sentindo que está nas nuvens..</p>
              </div>
              <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;background-image:url('img/products/placeholder-2.jpg');"></div>
            </div>
            <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" onclick="location.href='/produto/9'">
              <div class="my-3 p-3">
                <h2 class="display-5">Roupão</h2>
                <p class="lead">Perfeito para te deixar quentinho após o banho</p>
              </div>
              <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;background-image:url('img/products/roupao1.png');"></div>
            </div>
          </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Dec 24, 2019 00:00:00").getTime();
    
    // Update the count down every 1 second
    var x = setInterval(function() {
    
      // Get today's date and time
      var now = new Date().getTime();
    
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
    
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
      // Display the result in the element with id="demo"
      document.getElementById("time").innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";
    
      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("time").innerHTML = "EXPIRED";
      }
    }, 1000);
    </script>
@endsection
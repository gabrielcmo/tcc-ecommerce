@extends('layouts.new_layout')

@section('content')
    <div class="container">
        <div class="progress">
          <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
        </div><br>
        <div class="row">
            <div id="paypal-button"></div>
            <div class="col-md-6">
                <h3>Formas de pagamento</h3><br><br><br>
                <!-- Set up a container element for the button -->
                <div id="paypal-button-container"></div>
                <!-- Include the PayPal JavaScript SDK -->
                <script src="https://www.paypal.com/sdk/js?client-id=AdwcdXX0rds2X-qrkfkg0z5g-ixXqdrmotEd9mBMoSODPKHkQHtn3wawgKe0E7pWhkZiFKj38M5rAyLR&currency=BRL"></script>
                <script>
                    // Render the PayPal button into #paypal-button-container
                    paypal.Buttons({
                        // Set up the transaction
                        createOrder: function(data, actions) {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value: {{ Cart::total() + $calcFretePrazo['valorEntrega'] }}
                                    }
                                }]
                            });
                        },
                        // Finalize the transaction
                        onApprove: function(data, actions) {
                            // Call your server to save the transaction
                            return fetch('/paypal/transaction/complete', {
                                method: 'post',
                                headers: {
                                    'content-type': 'application/json',
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                        }
                    }).render('#paypal-button-container');
                </script>
            </div>
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-muted">Endereço de entrega</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div class="row">
                        <h6 class="col-12 my-0">{{ session('userData')['address'] }}, {{ session('userData')['n'] }}. {{ session('userData')['bairro'] }}. {{ session('userData')['state'] }} - {{ session('userData')['city'] }}</h6>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Frete para {{ session('userData')['cep'] }}</h6>
                            <span class="text-muted"><strong>R${{ $calcFretePrazo['valorEntrega'] }}</strong></span>
                        </div>
                        <span class="text-muted">Prazo de <strong>{{$calcFretePrazo['prazoEntrega'] }} dias</strong></span>
                        <span class="text-muted">
                            @if(isset($calcFretePrazo['obs']) && $calcFretePrazo['obs'] != "")
                                Observação: <strong>{{ $calcFretePrazo['obs'] }}</strong>    
                            @endif
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
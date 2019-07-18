@extends('layouts.default')

@section('stylesheets')
    <style>
        .footer{
            display: none;
        }
    </style>
@endsection

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
                <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=BRL"></script>

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
                            return actions.order.capture().then(function(details) {
                                // Show a success message to the buyer
                                alert('Transaction completed by ' + details.payer.name.given_name + '!');
                            });
                        }

                    }).render('#paypal-button-container');
                </script>
            </div>
            <div class="col-md-6">
                <h3>Suas informações</h3><br>
                <h6>Entrega</h6>
                @foreach(session('userData') as $row)
                    {{$row}} &nbsp;
                @endforeach
                <br><br>
                <h6>Pedido</h6>
                @foreach(Cart::content() as $row)
                    {{ $row->name }} &nbsp; {{ $row->qty }} x {{ $row->price }} <br>
                @endforeach
                <br>
                Frete para {{ session('userData')['cep'] }}: <strong>R${{ $calcFretePrazo['valorEntrega'] }} reais</strong> <br>
                Prazo: <strong>{{ $calcFretePrazo['prazoEntrega'] }} dias</strong> <br>
                @if(isset($calcFretePrazo['obs']) && $calcFretePrazo['obs'] !== "")
                    Observação: <strong>{{ $calcFretePrazo['obs'] }}</strong>    
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    
@endsection
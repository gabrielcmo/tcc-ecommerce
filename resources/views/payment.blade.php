@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="w3-panel w3-green w3-display-container">
            <span onclick="this.parentElement.style.display='none'"
                    class="w3-button w3-green w3-large w3-display-topright">&times;</span>
            <p>{!! $message !!}</p>
        </div>
        <?php Session::forget('success');?>
        @endif
    @if ($message = Session::get('error'))
        <div class="w3-panel w3-red w3-display-container">
            <span onclick="this.parentElement.style.display='none'"
                    class="w3-button w3-red w3-large w3-display-topright">&times;</span>
            <p>{!! $message !!}</p>
        </div>
        <?php Session::forget('error');?>
    @endif

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="accounts@freelanceswitch.com">
    <input type="hidden" name="item_name" value="Donation">
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="amount" value="99.00">
    <input type="hidden" name="no_shipping" value="0">
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="lc" value="AU">
    <input type="hidden" name="bn" value="PP-BuyNowBF">
    <input type="image" src="https://www.paypal.com/en_AU/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
    <img alt="" border="0" src="https://www.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">
</form>
@endsection
<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Doomus\Http\Controllers\UserController as User;

class CheckoutController extends Controller
{
    public function adressCheckout(){
        return view('address_checkout')->with('user', User::getUser());
    }
    
    public function paymentCheckout(){
        return view('payment_checkout');
    }

    public function addressData(Request $data){
        $userData[] = $data->name;
        $userData[] = $data->cpf;
        $userData[] = $data->address;
        $userData[] = $data->n;
        $userData[] = $data->state;
        $userData[] = $data->city;

        $data->session()->put('userData', $userData);

        return redirect('/checkout/pagamento');
    }

    public function paymentData(Request $data){
        //
    }

    public function success(){
        return view('success');
    }
}

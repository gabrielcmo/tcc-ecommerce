<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Doomus\Http\Controllers\UserController as User;
use Canducci\ZipCode\ZipCodeUf;
use Canducci\ZipCode\ZipCode;

class CheckoutController extends Controller
{
    public function adressCheckout(){
        return view('address_checkout')->with('user', User::getUser());
    }
    
    public function paymentCheckout(){
        return view('payment_checkout');
    }

    public function checkCep(Request $request){
        $cep = $request->get('query');

        $zipcodeinfo = zipcode($cep);

        return response($zipcodeinfo->getArray());
    }

    public function addressData(Request $data){
        
        $userData[] = $data->name;
        $userData[] = $data->cpf;
        $userData[] = $data->cep;
        $userData[] = $data->state;
        $userData[] = $data->city;
        $userData[] = $data->address;
        $userData[] = $data->n;

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

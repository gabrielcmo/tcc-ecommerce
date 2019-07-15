<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Doomus\Http\Controllers\UserController as User;
use Canducci\ZipCode\ZipCodeUf;
use Canducci\ZipCode\ZipCode;

class CheckoutController extends Controller
{
    public static function calcFretePrazo($cep_destino){
        $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
        $url .= "?nCdEmpresa=";
        $url .= "&sDsSenha=";
        $url .= "&sCepOrigem=08090284";
        $url .= "&sCepDestino=$cep_destino";
        $url .= "&nVlPeso=3";
        $url .= "&nCdFormato=1";
        $url .= "&nVlComprimento=30";
        $url .= "&nVlAltura=2";
        $url .= "&nVlLargura=18";
        $url .= "&sCdMaoPropria=n";
        $url .= "&nVlValorDeclarado=0";
        $url .= "&sCdAvisoRecebimento=s";
        $url .= "&nCdServico=04510";
        $url .= "&nVlDiametro=38";
        $url .= "&StrRetorno=xml";
        $url .= "&nIndicaCalculo=3";

        $result = simplexml_load_file($url);

        return $result->cServico;
    }

    public function adressCheckout(){
        return view('address_checkout')->with('user', User::getUser());
    }
    
    public function paymentCheckout(){
        $valor = 0;

        foreach(User::getCart() as $item){
            $resultadoCalc = self::calcFretePrazo(
                session('userData')['cep']
            );

            $valor += $resultadoCalc->Valor;
        }

        $resultadoCalc = [
            'valorEntrega' => $valor,
            'prazoEntrega' => $resultadoCalc->PrazoEntrega,
            'obs' => $resultadoCalc->obsFim
        ];

        return view('payment_checkout')->with('calcFretePrazo', $resultadoCalc);
    }

    public function checkCep(Request $request){
        $cep = $request->get('query');

        $zipcodeinfo = zipcode($cep);

        return response($zipcodeinfo->getArray());
    }

    public function addressData(Request $data){
        $userData['name'] = $data->name;
        $userData['cpf'] = $data->cpf;
        $userData['cep'] = $data->cep;
        $userData['state'] = $data->state;
        $userData['city'] = $data->city;
        $userData['address'] = $data->address;
        $userData['n'] = $data->n;

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

<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Doomus\Http\Controllers\UserController as User;
use Canducci\ZipCode\ZipCodeUf;
use Canducci\ZipCode\ZipCode;
use Gloudemans\Shoppingcart\Facades\Cart;
use Doomus\stdClass;
use Doomus\OrderStatus;
use SoapClient;
use Doomus\Http\Controllers\ProductController;
use Doomus\Http\Requests\Address;
use Session;

class CheckoutController extends Controller
{
    // const ADDRESS = 'https://ff.paypal-brasil.com.br/FretesPayPalWS/WSFretesPayPal';
    // private $request;

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

    // public function calcFretePaypal($cepDestino){
    //     $this->dados = new StdClass();
    //     $this->dados->altura = 1;
    //     $this->dados->largura = 1;
    //     $this->dados->peso = 1;
    //     $this->dados->cepDestino = $cepDestino;
    //     $this->dados->cepOrigem = '08090284';

    //     try {
    //         $client = new SoapClient(self::ADDRESS . '?wsdl');
            
    //         $response = $client->__soapCall($this->dados);
			
	// 		return $response;
	// 	} catch ( Exception $e ) {
	// 		throw new RuntimeException( 'Falha ao consumir o webservice' , $e->getCode() , $e );
	// 	}
    // }

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

    public function addressData(Address $data){
        $userData['cpf'] = $data->cpf;
        $userData['cep'] = $data->cep;
        $userData['bairro'] = $data->bairro;
        $userData['state'] = $data->state;
        $userData['city'] = $data->city;
        $userData['address'] = $data->address;
        $userData['n'] = $data->n;

        $data->session()->put('userData', $userData);

        return redirect('/checkout/pagamento');
    }

    public function paymentSuccess(){
        if(session('token-paypal') == null){
            Session::flash('status', 'Acesso negado');
            Session::flash('status-type', 'danger');
            return redirect('/');
        }else{
            $total = 0;
        
            foreach(Cart::content() as $item){
                ProductController::changeQtyLast($item->id, $item->qty);
                $dataOrder['products'][] = ['id' => $item->id, 'qty' => $item->qty, 'price' => $item->price];
                $total += $item->value;
            }

            $dataOrder['p_method_id'] = 1;
            $dataOrder['value_total'] = $total;
            $dataOrder['status_id'] = OrderStatus::$STATUS_PROCESSING;

            OrderController::store($dataOrder);

            Cart::destroy();

            return view('success');
        }
    }
}
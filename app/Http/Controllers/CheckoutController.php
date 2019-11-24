<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Doomus\Http\Controllers\UserController;
use Canducci\ZipCode\ZipCodeUf;
use Canducci\ZipCode\ZipCode;
use Gloudemans\Shoppingcart\Facades\Cart;
use Doomus\OrderStatus;
use Doomus\User;
use SoapClient;
use Doomus\Http\Controllers\ProductController;
use Doomus\Http\Requests\Address;
use Session;
use Auth;
use Doomus\Cupom;
use SebastianBergmann\Environment\Console;

class CheckoutController extends Controller
{
    // const ADDRESS = 'https://ff.paypal-brasil.com.br/FretesPayPalWS/WSFretesPayPal';
    // private $request;

    public function calcFrete(Request $request)
    {
        $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
        $url .= "?nCdEmpresa=";
        $url .= "&sDsSenha=";
        $url .= "&sCepOrigem=08090284";
        $url .= "&sCepDestino=$request->cep";
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

        
        $valorFrete = str_replace(',', '.', $result->cServico->Valor->__toString());

        Session::put('valorFrete', $valorFrete);
        Session::put('prazoFrete', $result->cServico->PrazoEntrega->__toString());
        Session::put('cep', $request->cep);
        $response = array(
            'status' => 'success',
            'valorFrete' => (float) $valorFrete,
            'prazoFrete' => $result->cServico->PrazoEntrega->__toString()
        );
        return response()->json($response);
        
    }

    public static function calcFretePrazo($cep_destino)
    {
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

        Session::put('valorFrete', $result->cServico->Valor->__toString());
        Session::put('prazoFrete', $result->cServico->PrazoEntrega->__toString());

        return $result->cServico;
    }

    public function adressCheckout()
    {
        return view('address_checkout')->with('user', UserController::getUser());
    }

    public function paymentCheckout()
    {
        return view('payment_checkout');
    }

    public function checkCep(Request $request)
    {

        if ($request->ajax()) {
            $cep = $request->get('query');
            $zipcodeinfo = zipcode($cep);
            if (is_null($zipcodeinfo)) {
                $request->session()->forget('valorFrete');
                $request->session()->forget('prazoFrete');
                return response()->json(['textStatus' => 'error']);
            } else {
                $response = $zipcodeinfo->getArray();
                $response['textStatus'] = 'success';
                if (session('valorFrete') == null && session('prazoFrete') == null) {
                    Session::put('valorFrete', $request->cServico->Valor->__toString());
                    Session::put('prazoFrete', $request->cServico->PrazoEntrega->__toString());
                }
                return response()->json($response);
            }
        } else {
            $cep = $request->get('query');
            $zipcodeinfo = zipcode($cep);

            return response($zipcodeinfo->getArray());
        }
    }

    public function addressData(Address $data)
    {
        $userData['cep'] = $data->cep;
        $userData['bairro'] = $data->bairro;
        $userData['state'] = $data->state;
        $userData['city'] = $data->city;
        $userData['address'] = $data->address;
        $userData['n'] = $data->n;
        
        if ($data->saveInfo == "on" || $data->saveInfo == true) {
            $user = Auth::user();
            $user->cep = $data->cep;
            $user->bairro = $data->bairro;
            $user->estado = $data->state;
            $user->cidade = $data->city;
            $user->endereco = $data->address;
            $user->numero = $data->n;
            $user->save();
        }

        $data->session()->put('userData', $userData);

        return redirect('/checkout/pagamento');
    }

    public function cupomValidate(Request $request, $cupom_name)
    {
        $cupom = Cupom::where('name', $cupom_name)->get();

        if (!count($cupom) == 0) {
            $cupom_discount = $cupom[0]->desconto / 100;
            $cart_discount = Cart::total() * $cupom_discount;
            $new_cart_total = round(Cart::total() - $cart_discount, 2);
            $request->session()->put('cupom', $cupom);
            
            $response = array(
                'status' => 'success',
                'cupom_name' => $cupom[0]->name,
                'cart_discount' => $cupom_discount,
                'cart_total' => round((float) Cart::total(), 2),
                'new_cart_total' => $new_cart_total,
                'message' => 'Cupom aplicado com sucesso'
            );

            return response()->json($response);
        } else {
            $request->session()->forget('cupom');
            $response = array(
                'status' => 'error',
                'message' => 'O cupom inserido é inválido, por favor, insira um outro cupom'
            );

            return response()->json($response);
        }
    }

    public function paymentSuccess()
    {
        if (session('token-paypal') == null) {
            Session::flash('status', 'Acesso negado');
            Session::flash('status-type', 'danger');
            return redirect('/');
        } else {
            foreach (Cart::content() as $item) {
                ProductController::changeQtyLast($item->id, $item->qty);
                $dataOrder['products'][] = ['id' => $item->id, 'qty' => $item->qty, 'price' => $item->price];
            }

            $total = Cart::total();

            if(session('cupom') !== null){
                $total *= 1 - (session('cupom')[0]['desconto'] / 100);
            }

            $frete = str_replace( ",", ".", session('valorFrete'));
            $total += $frete;

            $dataOrder['p_method_id'] = 1;
            $dataOrder['value_total'] = $total;
            $dataOrder['cep'] = session('userData')['cep'];
            $dataOrder['endereco'] = session('userData')['address'];
            $dataOrder['numero'] = session('userData')['n'];
            $dataOrder['bairro'] = session('userData')['bairro'];
            $dataOrder['cidade'] = session('userData')['city'];
            $dataOrder['estado'] = session('userData')['state'];
            $dataOrder['status_id'] = OrderStatus::$STATUS_PROCESSING;
            $dataOrder['frete'] = $frete;
            $dataOrder['prazo'] = session('prazoFrete');

            OrderController::store($dataOrder);

            Session::forget('valorFrete');
            Session::forget('prazoFrete');
            Session::forget('token-paypal');

            Cart::destroy();

            return view('success');
        }
    }
}

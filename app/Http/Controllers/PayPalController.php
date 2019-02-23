<?php

namespace ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Exception\PayPalConnectionException;
use URL;
use Redirect;

class PayPalController extends Controller
{
    public function __construct(){
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function Pay(Request $data_form_payment){

        $product_name = $data_form_payment->get('product_name');
        $quantity = $data_form_payment->get('quantity');
        $product_number = $data_form_payment->get('product_number');
        $product_price = $data_form_payment->get('product_value');

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item = new Item();
        $item->setName($product_name)->setCurrency('BRL')
            ->setQuantity($quantity)->setSku($product_number)
            ->setPrice($product_price);

        $item_list = new ItemList();
        $item_list->setItems(array(($item)));

        $details = new Details();
        $details->setShipping(1.2)->setTax(1.3)->setSubTotal(17.50);

        $amount = new Amount();
        $amount->setCurrency('BRL')
            ->setTotal(20)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Payment description')
            ->setInvoiceNumber(uniqid());

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(URL::route('paypal_payment'))
            ->setCancelUrl(URL::route('paypal_payment'));

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        // dd($payment->create($this->_api_context)));

        try{
            $payment->create($this->_api_context);
        }catch(PayPalConnectionException $exception){
            if(\Config::get('app.debug')){
                \Session::put('error', 'Connection timeout');

                return Redirect::route('paypal_payment');
            }else{
                \Session::put('error', 'Something went wrong, sorry for inconvenient');

                return Redirect::route('paypal_payment');
            }
        }

        foreach($payment->getLinks() as $link){
            if($link->getRel() == 'approval_url'){
                $redirect_url = $link->getHref();
                break;
            }
        }

        // Add payment ID to session

        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)){
            return Redirect::away($redirect_url);
        }

        \Session::put('error', 'Unknown error occurred');
        
        return Redirect::route('paypal_payment');
    }
}

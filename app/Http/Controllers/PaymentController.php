<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use Config;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaymentController extends Controller
{
    public function __construct(){
        $paypal_config = Config::get('paypal');

        $this->_apiContext = new ApiContext(
            new OAuthTokenCredential(
              $paypal_config['client_id'],
              $paypal_config['secret']
            )
        );

        $this->_apiContext->setConfig($paypal_config['settings']);
    }

    public function create(){
        // Create new payer and method
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // Set redirect URLs
        $redirectUrls = new RedirectUrls();
        $app_url = env('APP_URL');

        $redirectUrls->setReturnUrl("$app_url/execute-payment")
        ->setCancelUrl("$app_url/cancel-payment");

        // Set payment amount
        if(session('cupom') !== null && session('valorFrete') !== null){
            $amount = new Amount();
            $amount->setCurrency("BRL")
                ->setTotal(round((1 - (session('cupom')['desconto'] / 100)) * Cart::total(), 2) + str_replace(',','.', session('valorFrete')));
        }elseif(session('valorFrete') !== null){
            $amount = new Amount();
            $amount->setCurrency("BRL")
                ->setTotal(Cart::total() + session('valorFrete'));
        }else{
            $amount = new Amount();
            $amount->setCurrency("BRL")
                ->setTotal(Cart::total());
        }

        // Set transaction object
        $transaction = new Transaction();
        $transaction->setAmount($amount)
        ->setDescription("Payment description");

        // Create the full payment object
        $payment = new Payment();
        $payment->setIntent('sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));

        // Create payment with valid API context
        try {
            $payment->create($this->_apiContext);
        
            // Get PayPal redirect URL and redirect the customer
            return redirect($payment->getApprovalLink());
        
            // Redirect the customer to $approvalUrl
        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }
    }

    public function execute(){
        // Get payment object by passing paymentId
        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $this->_apiContext);
        $payerId = $_GET['PayerID'];

        // Execute payment with payer ID
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);
        
        $transaction = new Transaction();
        $amount = new Amount();

        $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal(Cart::subtotal());

        $amount->setCurrency('BRL');
        $amount->setTotal(Cart::total());
        $amount->setDetails($details);

        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);

        try{
            // Execute payment
            $result = $payment->execute($execution, $this->_apiContext);
            
            try{

                $payment = Payment::get($paymentId, $this->_apiContext);
            }catch(Exception $ex){

                die($ex);
            }
        }catch(PayPalConnectionException $ex){

            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        }catch(Exception $ex){

            die($ex);
        }

        Session::flash('status', 'Pagamento realizado');
        Session::put('token-paypal', $_GET['token']);
        return redirect('/paypal/transaction/complete');
    }

    public function cancel(){
        return redirect('/');
    }
}

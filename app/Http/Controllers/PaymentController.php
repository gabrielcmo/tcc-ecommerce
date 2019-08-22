<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Paypal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class PaymentController extends Controller
{
    public function __construct(){
        $paypal_config = Config::get('paypal');

        $this->$_apiContext = new ApiContext(
            new OAuthTokenCredential(
              $paypal_config['client_id'],
              $paypal_config['secret']
            )
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function createPayment(){
        // Create new payer and method
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // Set redirect URLs
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('processPaypal'))
        ->setCancelUrl(route('cancelPaypal'));

        // Set payment amount
        $amount = new Amount();
        $amount->setCurrency("BRL")
        ->setTotal(10);

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
            $approvalUrl = $payment->getApprovalLink();
        
            // Redirect the customer to $approvalUrl
        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }
    }

    public function executePayment(){
        // Get payment object by passing paymentId
        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $this->_apiContext);
        $payerId = $_GET['PayerID'];

        // Execute payment with payer ID
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try{
            // Execute payment
            $result = $payment->execute($execution, $this->_apiContext);
            
            if($result->getState() == 'approved'){
                Session::flash('status', 'Pagamento aprovado!');

                return redirect('/');
            }else{
                Session::flash('status', 'O pagamento falhou');
                Session::flash('status-type', 'danger');

                return redirect('/');
            }
        }catch(PayPalConnectionException $ex){
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        }catch(Exception $ex){
            die($ex);
        }
    }
}

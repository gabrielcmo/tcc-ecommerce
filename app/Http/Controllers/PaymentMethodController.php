<?php

namespace Doomus\Http\Controllers;

use Doomus\Models\Payment_Method;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $c = new Payment_Method();
        $c->type = $request->type;
        $c->save();
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Doomus\Payment_Method  $payment_Method
     * @return \Illuminate\Http\Response
     */
    public function show(Payment_Method $payment_Method)
    {
        return Payment_Method::find($payment_Method);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Doomus\Payment_Method  $payment_Method
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment_Method $payment_Method)
    {
        //
    }
}

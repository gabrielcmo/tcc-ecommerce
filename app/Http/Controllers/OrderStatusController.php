<?php

namespace Doomus\Http\Controllers;

use Doomus\Models\Order_Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \Doomus\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return Order::find($order->id)->id_status;
    }
}

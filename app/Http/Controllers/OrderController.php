<?php

namespace Doomus\Http\Controllers;

use Doomus\Order;
use Illuminate\Http\Request;
use Doomus\Http\Controllers\UserController as User;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $orders = User::getOrders();
        return view('user.order')->with('orders', $orders);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Doomus\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function cancel(Request $request)
    {
        $order = Order::find($request->id);
        
        //
    }
}

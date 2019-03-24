<?php

namespace Doomus\Http\Controllers;

use Doomus\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::all()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();
        $qtd_total = count(Cart_Product::find($request->id_cart_product));
        $order->qtd_total = $qtd_total;
        $order->value_total = $request->value_total;
        $order->id_cart_product = $request->id_cart_product;
        $order->id_payment_method = $request->id_payment_method;
        $order->id_user = $request->id_user;
        $order->save();
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Doomus\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return Order::find($order->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Doomus\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $o = Order::find($order->id);
        $o->delete();
        return;
    }
}

<?php

namespace Doomus\Http\Controllers;

use Doomus\Order;
use Illuminate\Http\Request;
use Doomus\Http\Controllers\UserController as User;
use Session;
use Doomus\Historic;
use Doomus\HistoricStatus;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * 
     */
    public static function store($request)
    {
        foreach($request['products'] as $product){
            $order = new Order();
            $order->user_id = User::getUser()->id;
            $order->product_id = $product['id'];
            $order->qty = $product['qty'];
            $order->payment_method_id = $request['p_method_id'];
            $order->save();
        }

        return back();
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
     * Cancel the order
     *
     * @param  \Doomus\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function cancel($order_id)
    {
        $order = Order::find($order_id);
        
        $historic = new Historic();
        $historic->user_id = User::getUser()->id;
        $historic->product_id = $order->product->id;
        $historic->qty = $order->qty;
        $historic->status_id = HistoricStatus::$STATUS_CANCELLED;
        $historic->save();
        
        $order->destroy($order_id);

        Session::flash('status', 'Pedido cancelado');
        return back();
    }
}

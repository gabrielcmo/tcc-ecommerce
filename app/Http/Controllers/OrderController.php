<?php

namespace Doomus\Http\Controllers;

use Doomus\Order;
use Illuminate\Http\Request;
use Doomus\Http\Controllers\UserController as User;
use Session;
use Doomus\Historic;
use Doomus\HistoricStatus;
use Doomus\OrderStatus;
use Doomus\OrderProduct;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * 
     */
    public static function store($request)
    {
        $order = new Order();
        $order->user_id = User::getUser()->id;
        $order->payment_method_id = $request['p_method_id'];
        $order->value_total = $request['value_total'];
        $order->status_id = $request['status_id'];
        $order->frete = $request['frete'];
        $order->prazo = $request['prazo'];
        $order->save();
        
        foreach($request['products'] as $product){
            $order_product = new OrderProduct();
            $order_product->order_id = $order->id;
            $order_product->product_id = $product['id'];
            $order_product->qty = $product['qty'];
            $order_product->price = $product['price'];
            $order_product->save();
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
        dd($orders);
        // $historic = User::getHistoric();
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
        
        if(Historic::where('order_id', $order_id)->first() !== null){
            Session::flash('status', 'Esse pedido ja foi cancelado');
            Session::flash('status-type', 'danger');
            return back();
        }
        
        $historic = new Historic();
        $historic->order_id = $order_id;
        $historic->user_id = User::getUser()->id;
        $historic->status_id = HistoricStatus::$STATUS_CANCELLED;
        $historic->save();

        $order->status_id = OrderStatus::$STATUS_GUARDED;
        $order->save();

        Session::flash('status', 'Pedido cancelado');
        return back();
    }
}

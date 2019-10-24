<?php

namespace Doomus\Http\Controllers;

use Doomus\Order;
use Illuminate\Http\Request;
use Doomus\Http\Controllers\UserController as User;
use Session;
use Doomus\OrderStatus;
use Doomus\OrderProduct;
use Doomus\Product;
use Doomus\ProductImage;

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
        $order->data_realizado = date('Y-m-d') ." ". date("H:i:s");
        $order->data_aprovado = date('Y-m-d') ." ". date("H:i:s");
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
        return view('user.orders')->with('orders', $orders);
    }

    public function showOrderProducts(Request $request)
    {
        $products_id = OrderProduct::where('order_id', $request->order_id)->select('product_id')->addSelect('qty')->get();
        foreach ($products_id as $product) {
            $product_data = Product::where('id', $product->product_id)
                ->addSelect('name')
                ->addSelect('price')
                ->get(); 
                
            $product_image = ProductImage::where('product_id', $product->product_id)->select('filename')->first();
            if ($product_image == null) {
                $product_image = 'logo_icone.png';
            } else {
                $product_image = $product_image->filename;
            }
            $response[] = [
                'product_id'=>$product->product_id,
                'product_name'=>$product_data[0]->name,
                'product_qty'=>$product->qty,
                'product_price'=>$product_data[0]->price,
                'product_image'=>$product_image
            ];
        }

        return response()->json($response);
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
        
        if($order->status_id == 4){
            Session::flash('status', 'Esse pedido ja foi cancelado');
            Session::flash('status-type', 'danger');
            return back();
        }

        $order->status_id = OrderStatus::$STATUS_GUARDED;
        $order->data_cancelado = date('Y-m-d') ." ". date("H:i:s");
        $order->save();

        Session::flash('status', 'Pedido cancelado');
        return back();
    }

    public function pedidoEntregue($order_id){
        $order = Order::find($order_id);

        $order->status_id = OrderStatus::$STATUS_OK;
        $order->data_entrega = date('Y-m-d') ." ". date("H:i:s");
        $order->save();

        Session::flash('status', 'Pedido definido como entregue');

        return back(); 
    }

    public function pedidoDespachado($order_id){
        $order = Order::find($order_id);

        $order->status_id = OrderStatus::$STATUS_TRANSPORT;
        $order->data_despache = date('Y-m-d') ." ". date("H:i:s");
        $order->save();

        Session::flash('status', 'Pedido definido como em transporte');

        return back(); 
    }
}

<?php

namespace Doomus\Http\Controllers;

use Doomus\Models\Cart_Product;
use Illuminate\Http\Request;

class CartProductController extends Controller
{
    public const default_quantity = 1; 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart_product = new Cart_Product();
        $cart_product->qtd = default_quantity;
        $cart_product->id_product = $request->id_product;
        $cart_product->id_cart = $request->id_cart;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Doomus\Cart_Product  $cart_Product
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $id_cart)
    {
        return Cart_Product::where('id_cart', $id_cart)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Doomus\Cart_Product  $cart_Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart_Product $cart_Product)
    {
        $c_p = Cart_Product::find($cart_Product->id);
        $c_p->qtd = $request->qtd;
        $c_p->id_product = $request->id_product;
        $c_p->id_cart = $request->id_cart;
        $c_p->save();
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Doomus\Cart_Product  $cart_Product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart_Product $cart_Product)
    {
        $c_p = Cart_Product::find($cart_Product->id);
        $c_p->delete();
        return;
    }
}

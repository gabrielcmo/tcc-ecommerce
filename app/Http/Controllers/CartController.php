<?php

namespace Doomus\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Doomus\CartProduct;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Lista de todos os carrinhos e suas respectivas compras
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = CartProduct::all();

        return view('admin.cart.index')->with('cart', $carts);
    }


    public static function setCart()
    {
        $cart = new Cart();
        $cart->save();

        return $cart->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Doomus\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
         //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Doomus\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Doomus\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Doomus\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Cart::destroy();

        Session::flash('status', 'Carrinho limpo');

        return redirect('/');
    }
}

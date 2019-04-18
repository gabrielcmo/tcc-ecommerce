<?php

namespace Doomus\Http\Controllers;

use Doomus\Cart;
use Illuminate\Http\Request;
use Session;
use Doomus\CartProduct;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = new Cart();
        $cart->save();

        $user_id = $request->user_id;

        $user = User::find($user_id);
        $user->cart_id = $cart->id;

        Session::flash('status', 'Carrinho criado com sucesso');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \Doomus\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
         $cart_of_user = $cart->id;

         return view('admin.cart.show')->with('cart', $cart_of_user);
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
    public function destroy(Cart $cart)
    {
        $cart_id = $cart->id;

        $cart_of_user = Cart::find($cart_id);
        $cart_product = CartProduct::where('cart_id', $cart_id)->get();

        $cart_product->destroy();
        $cart_of_user->destroy();


        Session::flash('status', 'Carrinho destruído com sucesso');

        return back();
    }
}

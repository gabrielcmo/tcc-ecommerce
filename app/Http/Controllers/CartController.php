<?php

namespace Doomus\Http\Controllers;

use Doomus\Cart;
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
        if(Auth::guard()->user()->cart->products !== null){
            Auth::guard()->user()->cart->products()->detach();
        }

        Session::flash('status', 'Carrinho limpo');

        return redirect('/');
    }
}

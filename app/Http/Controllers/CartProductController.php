<?php

namespace Doomus\Http\Controllers;

use Doomus\CartProduct;
use Illuminate\Http\Request;
use Session;

class CartProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart_product = new CartProduct();
        $cart_product->cart_id = $request->cart_id;
        $cart_product->product_id = $request->product_id;
        $cart_product->save();

        Session::flash('status', 'Adicionado ao carrinho');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \Doomus\CartProduct  $cartProduct
     * @return \Illuminate\Http\Response
     */
    public function show(CartProduct $cartProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Doomus\CartProduct  $cartProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(CartProduct $cartProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Doomus\CartProduct  $cartProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartProduct $cartProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Doomus\CartProduct  $cartProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartProduct $cartProduct)
    {
        $cart_product = CartProduct::find($cartProduct->id);
        $cart_product->destroy();

        Session::flash('status', 'Removido do carrinho');

        return back();
    }
}

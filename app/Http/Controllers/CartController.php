<?php

namespace Doomus\Http\Controllers;

use Doomus\Models\Cart;
use Doomus\Http\Controllers\CartProductController as CartProducts;
use Illuminate\Http\Request;

class CartController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function store(/* null - have only id increments */)
    {
        $cart = new Cart();
        $cart->save();
        return;
    }

    /**
     * Display the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return CartProducts::show(Auth::user()->id_cart);
    }

}

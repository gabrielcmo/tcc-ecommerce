<?php

namespace Doomus\Http\Controllers;

use DebugBar\DebugBar;
use Doomus\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Debug\Debug;
use Doomus\Product;
use Doomus\Http\Controllers\CartController;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class UserController extends Controller
{
    /**
     * Add to cart
     *
     * @param Product $product_id
     * @return \Illuminate\Http\Response
     */
    public function addToCart($product_id)
    {
        $product = Product::find($product_id);

        $name = $product->name;
        $qtd = 1;
        $price = 1.99;

        Cart::add($product_id, $name, $qtd, $price);

        Session::flash('status', 'Produto adicionado ao carrinho');

        return back();
    }

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
        //
    }

    /*
     * Functions to get properties
     * */
    public static function getUser()
    {
        return Auth::guard()->user();
    }

    public static function getOrders()
    {
        return Auth::guard()->user()->orders;
    }

    public static function getHistoric()
    {
        return Auth::guard()->user()->historic;
    }

    public static function getCart()
    {
        return Auth::guard()->user()->cart;
    }

    public static function getCartProducts()
    {
        return  Auth::guard()->user()->cart->products;
    }

    /**
     * Display the specified resource.
     *
     */
    public function showProfile()
    {
        $user = self::getUser();
        return view('user.profile')->with('user', $user);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showOrders()
    {
        $orders = self::getOrders();
        return view('user.order')->with('orders', $orders);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHistoric()
    {
        $historic = self::getHistoric();
        return view('user.historic')->with('historic', $historic);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCart()
    {
        return view('user.cart');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Doomus\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Doomus\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Doomus\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

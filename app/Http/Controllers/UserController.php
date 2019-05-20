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
    public function addToCart(Product $product_id)
    {
        $product = Product::find($product_id);

        $name = $product->name;
        $qtd = 1;
        $price = $product->price;

        Cart::add($product_id, $name, $qtd, $price)->associate('Product');

        Session::flash('status', 'Produto adicionado ao carrinho');

        return back();
    }
    
    /**
     * Remove from cart
     *
     * @param Product $product_id
     * @return \Illuminate\Http\Response
     */
    public function removeFromCart(Product $product_id)
    {
        Cart::remove($product_id);

        Session::flash('status', 'Produto removido do carrinho');

        return back();
    }

    /**
     * Change quantity
     *
     * @param Product $product_id
     * @param Product $qty
     * @return \Illuminate\Http\Response
     */
    public function changeQuantity(Product $product_id, $qty)
    {
        Cart::update($product_id, $qty);

        return back();
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Doomus\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $user = self::getUser();

        $user->image = $request->image;
        $user->name = $request->name;
        $user->name = $request->email;
        $user->name = $request->password;
        $user->save();

        return back();
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
        $cart = self::getCart();
        return view('user.cart')->with('cart', $cart);
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
        return Cart::content();
    }
}

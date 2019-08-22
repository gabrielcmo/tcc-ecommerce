<?php

namespace Doomus\Http\Controllers;

use Doomus\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Doomus\Product;
use Doomus\Http\Controllers\CartController;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Hash;
use willvincent\Rateable\Rating;

class UserController extends Controller
{
    public function avaliate(Request $avaliacao){
        $post = Product::find($avaliacao->product_id);

        $rating = new Rating;
        $rating->rating = $avaliacao->rate;
        $rating->user_id = Auth::id();

        $post->ratings()->save($rating);

        Session::flash('status', 'Avaliado com sucesso!');
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
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $user = self::getUser();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back();
    }

    /*
     * Functions to get atributes of user
     * */
    public static function getUser()
    {
        return Auth::guard()->user();
    }

    public static function getOrders()
    {
        return Auth::guard()->user()->order;
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
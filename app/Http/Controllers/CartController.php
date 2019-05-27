<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Doomus\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public static function setCart()
    {
        $cart = new Cart();
        $cart->save();

        return $cart->id;
    }
}

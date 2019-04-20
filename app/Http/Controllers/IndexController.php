<?php

namespace Doomus\Http\Controllers;

use Doomus\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Doomus\Product;
use Doomus\Category;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        if(Auth::user())
        {
            $cart_products = UserController::getCartProducts();
        }else{
            $cart_products = null;
        }

        return view('index')
            ->with('products', $products)
            ->with('categories', $categories)
            ->with('cart_products', $cart_products);
    }
}

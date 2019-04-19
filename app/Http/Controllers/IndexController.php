<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Doomus\Product;
use Doomus\Category;
use Doomus\Http\Controllers\UserController;

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
        $cart_products = UserController::getCartProducts();

        return view('index')
            ->with('products', $products)
            ->with('categories', $categories)
            ->with('cart_products', $cart_products);
    }
}

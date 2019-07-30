<?php

namespace Doomus\Http\Controllers;

use Doomus\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Doomus\Product;
use Doomus\Category;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

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

        return view('index')
            ->with('products', $products)
            ->with('categories', $categories);
    }
    public function testData()
    {
        $products = Product::all();

        return view('new_landing')->with('products', $products);
    }
}

<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Doomus\Product;
use Doomus\Order;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function products(){
        return view('admin.products')->with('products', Product::all());    
    }

    public function orders(){
        return view('admin.orders')->with('orders', Order::all());
    }
}

<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Doomus\Http\Controllers\ProductController as Product;
use Doomus\Http\Controllers\CategoryController as Category;

class IndexController extends Controller
{
    function view(){
        return view('index')->with('products', Product::index())->with('categories', Category::index());
    }
}

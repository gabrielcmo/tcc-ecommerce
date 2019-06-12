<?php

namespace Doomus\Http\Controllers;

use Doomus\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show product method
     * @param Product $id
     */
    public function show($id)
    {
        return view('product')->with('product', Product::find($id));
    }
}

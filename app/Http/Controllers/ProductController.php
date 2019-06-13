<?php

namespace Doomus\Http\Controllers;

use Doomus\Product;
use Illuminate\Http\Request;
use Session;

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

    public function store(Product $request){
        
    }

    public function formEdit($product_id){            
        return view('admin.editProduct')->with('product', Product::find($product_id));
    }

    public function destroy($product_id){
        Product::destroy($product_id);
        Session::flash('status', 'Produto excluído com sucesso');
        return back();
    }
}

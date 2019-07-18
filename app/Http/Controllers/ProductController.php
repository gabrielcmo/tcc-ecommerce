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

    /* 
    * Form to create a product
    */
    public function create(){
        return view('admin.create');
    }

    /* 
    * Store a product
    */
    public function store(Request $request){
        $product = new Product();

        $filename = time().'.'.request()->image->getClientOriginalExtension();

        request()->image->move(public_path('img/products'), $filename);
        
        $product->name = $request->name;
        $product->details = $request->details;
        $product->description = $request->description;
        $product->qtd_last = $request->qtd_last;
        $product->weight = $request->weight;
        $product->width = $request->width;
        $product->height = $request->height;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        $product->save();

        Session::flash('status', 'Produto criado com sucesso');
        return back();
    }

    /* 
    * Form to edit a product
    */
    public function formEdit($product_id){            
        return view('admin.editProduct')->with('product', Product::find($product_id));
    }

    /* 
    * Update a product
    */
    public function update(Request $request){
        $product = Product::find($request->product_id);

        $filename = time().'.'.request()->image->getClientOriginalExtension();

        request()->image->move(public_path('img/products'), $filename);

        $product->name = $request->name;
        $product->details = $request->details;
        $product->description = $request->description;
        $product->qtd_last = $request->qtd_last;
        $product->weight = $request->weight;
        $product->width = $request->width;
        $product->height = $request->height;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        $product->save();

        Session::flash('status', 'Produto atualizado com sucesso');
        return redirect('/admin/products');
    }

    /* 
    * Destroy a product
    */
    public function destroy($product_id){
        Product::destroy($product_id);
        Session::flash('status', 'Produto excluído com sucesso');
        return back();
    }
}

<?php

namespace Doomus\Http\Controllers;

use Doomus\Product;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    public static function addPicture($image){
        $filename = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('img/products'), $filename);
        $product_img = new ProductImage();
        $product_img->filename = $filename;
        $product_img->save();
        return;
    }
    
    public static function changeQtyLast($product_id, $qty){
        $product = Product::find($product_id);
        $product->qtd_last = $product->qtd_last - $qty;
        $product->save();
        return back();
    }

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

       if($request->hasFile('image')){
            self::addPicture(request()->image);
       }
        
        $product->name = $request->name;
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
        
        if($request->hasFile('image')){
            self::addPicture(request()->image);
       }

        $product->name = $request->name;
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

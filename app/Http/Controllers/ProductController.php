<?php

namespace Doomus\Http\Controllers;

use Doomus\Product;
use Illuminate\Http\Request;
use Session;
use Doomus\ProductImage;
use Auth;
use Doomus\Http\Controllers\CartController;

class ProductController extends Controller
{
    public function buyNow (Request $request) {
        $product = Product::find($request->get('product_id'));
        CartController::addToCartBuyNow($request->get('product_id'));
        return redirect('/checkout/endereco')->with('user', Auth::user());
    }

    public static function addPicture($image, $p_id){
        $filename = rand(1, 2000) . time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/img/products'), $filename);

        $product_img = new ProductImage();
        $product_img->filename = $filename;
        $product_img->product_id = $p_id;
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
        $product->name = $request->name;
        $product->description = $request->description;
        $product->qtd_last = $request->qtd_last;
        $product->weight = $request->weight;
        $product->lenght = $request->lenght;
        $product->width = $request->width;
        $product->height = $request->height;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->save();

        $imagens = ProductImage::where('product_id', $product->id)->get();
        if (count($imagens) !== 0) {
            foreach ($imagens as $img) {
                $img->delete();
            }
        }

        if(is_array(request()->img)){
            foreach(request()->img as $key => $image){
                self::addPicture($image, $product->id);
            }
        }else{
            self::addPicture(request()->img, $product->id);
        }

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
        
        if (request()->img !== null) 
        {
            $imagens = ProductImage::where('product_id', $product->id)->get();
        
            if (count($imagens) !== 0) {
                foreach ($imagens as $img) {
                    $img->delete();
                }
            }
            
            if(is_array(request()->img)){
                foreach(request()->img as $key => $image){
                    self::addPicture($image, $product->id);
                }
            }else{
                self::addPicture(request()->img, $product->id);
            }
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->qtd_last = $request->qtd_last;
        $product->weight = $request->weight;
        $product->lenght = $request->lenght;
        $product->width = $request->width;
        $product->height = $request->height;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        $product->save();

        Session::flash('status', 'Produto atualizado com sucesso');
        return redirect('/admin');
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

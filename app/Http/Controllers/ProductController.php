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
    public static function mediaNotaAvaliacao(Product $product) 
    {
        $count = count($product->ratings);

        if($count == 0){
            return 0;
        }

        $soma = 0;
        foreach($product->ratings as $rating)
        {
            $soma += $rating->note;
        }

        $media = $soma / $count;

        return $media;
    }

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
        $product->qtd_restante = $product->qtd_restante - $qty;
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
        $product->nome = $request->nome;
        $product->descricao = $request->descricao;
        $product->qtd_restante = $request->qtd_restante;
        $product->peso = $request->peso;
        $product->largura = $request->largura;
        $product->comprimento = $request->comprimento;
        $product->altura = $request->altura;
        $product->valor = $request->valor;
        $product->categoria_id = $request->categoria_id;
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

        $product->nome = $request->nome;
        $product->descricao = $request->descricao;
        $product->qtd_restante = $request->qtd_restante;
        $product->peso = $request->peso;
        $product->largura = $request->largura;
        $product->comprimento = $request->comprimento;
        $product->altura = $request->altura;
        $product->valor = $request->valor;
        $product->categoria_id = $request->categoria_id;

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

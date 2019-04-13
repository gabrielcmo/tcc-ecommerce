<?php

namespace Doomus\Http\Controllers;

use Doomus\Models\Product;
use Doomus\Models\Category;
use Doomus\Http\Controllers\CategoryController;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        $products = Product::all();
        
        self::countProductsPost($products);

        return view('index')->with('products', $products)->with('categories', CategoryController::index());
    }

    public static function countProductsPost($products){
        $total_products = count($products);

        $_POST["total_products"] = $total_products;
    }

    // Paginação dos produtos
    public function pagination($id){
        $all_products = Product::all();

        self::countProductsPost($all_products);

        foreach($all_products as $one_product){
            if($one_product->id > $_GET['id_last_product']){
                $products[] = $one_product;
            }
        }

        $categories = Category::all();

        return view('index')->with('products', $products)->with('categories', $categories);
    }
    
    /**
     * Exibe produtos de uma categoria específica.
     *
     */
    public function productOfCategory($id){
        $products = Product::where('id_category', $id)->get();

        $categories = Category::all();

        self::countProductsPost($products);

        return view('index')->with('products', $products)
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->value = $request->value;
        $product->qtd_in_stock = $request->qtd_in_stock;
        $product->id_category = $request->id_category;
        $product->save();
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Doomus\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return Product::find($product->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Doomus\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return Product::find($product->id);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Doomus\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product = Product::find($product->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->value = $request->value;
        $product->qtd_in_stock = $request->qtd_in_stock;
        $product->id_category = $request->id_category;
        $product->save();
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Doomus\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $p = Product::find($product->id);
        $p->delete();
        return;
    }
}

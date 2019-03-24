<?php

namespace Doomus\Http\Controllers;

use Doomus\Models\Product;
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
        return Product::all();
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

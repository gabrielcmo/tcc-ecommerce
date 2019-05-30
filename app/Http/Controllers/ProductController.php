<?php

namespace Doomus\Http\Controllers;

use Doomus\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
    * Search for products method
    * @param Request $search
    */
    public function find(Request $search)
    {
        if($search->ajax()){
            $query = $search->get('query');
            if($query !== ''){
                $data = Product::where('name', 'like', '%'.$query.'%')
                    ->orWhere('id', 'like', '%'.$query.'%')
                    ->orderBy('id', 'DESCS')
                    ->get();

                $total_qtd = $data->count();
            }

            if($total_qtd > 0){
                foreach($data as $product){
                    $output = "<a href="."/produto/$product->id"." class='dropdown-item'> {{$product->name}} &nbsp;&nbsp; {{$product->category}} </a>";
                }
            }else{
                $output = '<p>Nada encontrado</p>';
            }

            $data = [
                'ul_data' => $output,
                'ul_total' => $total_qtd
            ];

            echo json_encode($data);
        } 
    }

    /**
     * Show product method
     * @param Product $id
     */
    public function showProduct($id)
    {
        return view('product')->with('product', Product::find($id));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index')->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Doomus\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.index')->with('ptoduct', Product::find($product->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Doomus\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit');
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
        $product_new = Product::find($product->id);
        $product_new->name = $request->name;

        Session::flash('status', "Produto atualizado");

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Doomus\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product_new = Product::find($product->id);
        $product_new->destroy();

        Session::flash('status', "Produto deletado com sucesso");

        return back();
    }
}

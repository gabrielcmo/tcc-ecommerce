<?php

namespace Doomus\Http\Controllers;

use Doomus\Order;
use Doomus\Product;
use Doomus\ProductRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function productRating(Request $request) 
    {
        $response = ProductRating::where([
            'user_id' => Auth::user()->id,
            'product_id' => $request->get('product_id')
        ])->first();

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($order_id)
    {
        $order = Order::find($order_id);

        $avaliados = array();
        $naoAvaliados = array();
        foreach ($order->product as $product) {
            $rating = ProductRating::where([
                'user_id' => Auth::user()->id,
                'product_id' => $product->id
            ])->get();

            if (count($rating) == 0) {
                $naoAvaliados[] = $product;
            }else{
                $avaliados[] = $product;
            }
        }

        return view('user.rating-products')->with('produtos_avaliados', $avaliados)
        ->with('produtos_nao_avaliados', $naoAvaliados)
        ->with('order_id', $order->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productRating = new ProductRating();

        $productRating->title = $request->input('title-rating');
        $productRating->text = $request->input('description-text');
        $productRating->note = $request->input('note-rating');
        $productRating->user_id = Auth::user()->id;
        $productRating->order_id = $request->input('order-id');
        $productRating->product_id = $request->input('product-rating');

        $productRating->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($order_id)
    {
        $ratings = ProductRating::where([
            'user_id' => Auth::user()->id,
            'order_id'=> $order_id
        ])->get();
        
        return view('user.rating-show')->with('ratings', $ratings)->with('order_id', $order_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

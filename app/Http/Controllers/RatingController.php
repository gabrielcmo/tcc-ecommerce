<?php

namespace Doomus\Http\Controllers;

use Doomus\Order;
use Doomus\Product;
use Doomus\ProductRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = Auth::user()->ratings;


        return view('user.ratings')->with('ratings', $ratings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Auth::user()->order;
    
        foreach ($orders as $order) {
            if ($order->status_id === 4) {
                $order_products[] = $order->product;
            } else {
                continue;
            }  
        }
    
        $products_data = array();
        foreach ($order_products as $products) {
            foreach ($products as $product) {
                $rating = ProductRating::where('user_id', Auth::user()->id)->where('product_id', $product->id)->get();
                if (count($rating) == 0) {
                    array_push($products_data, ['product_id'=>$product->id, 'product_name' => $product->name]);
                }
            }
        }
        $response = array_unique($products_data, SORT_REGULAR);
    
        return view('user.rating-create')->with('products', $response);
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
        $productRating->product_id = $request->input('product-id');

        $productRating->save();

        Session::flash('status', 'Produto avaliado com sucesso');
        return redirect()->route('rating.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($rating_id)
    {
        $rating = ProductRating::find($rating_id);

        return view('user.rating-edit')->with('rating', $rating);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rating = ProductRating::find($request->input('rating-id'));

        $rating->title = $request->input('new-title');
        $rating->text = $request->input('new-text');
        $rating->note = $request->input('new-note');

        $rating->save();

        Session::flash('status', 'Avaliação atualizada com sucesso');
        return redirect()->route('rating.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rating_id)
    {
        ProductRating::destroy($rating_id);

        Session::flash('status', 'Avaliação excluída com sucesso');
        return back();
    }
}

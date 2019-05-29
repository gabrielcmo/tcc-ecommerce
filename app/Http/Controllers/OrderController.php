<?php

namespace Doomus\Http\Controllers;

use Doomus\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkView(){
        return view('checkout')->with('user', UserController::getUser());
    }
    
    public function checkoutData(Request $data){
        // $data->validate([
        //     'name' => 'required',
        //     'cpf' => 'required',
        //     'address' => 'required',
        //     'n' => 'required',
        //     'state' => 'required',
        //     'city' => 'required',
        // ]);

        $userData[] = $data->name;
        $userData[] = $data->cpf;
        $userData[] = $data->address;
        $userData[] = $data->n;
        $userData[] = $data->state;
        $userData[] = $data->city;

        $data->session()->put('userData', $userData);

        return view('payment_method')->with('userData', $userData);
    }

    public function showThanksView(){
        return view('thankyou');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Doomus\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Doomus\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Doomus\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Doomus\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}

<?php

namespace Doomus\Http\Controllers;

use Doomus\Historic;
use Illuminate\Http\Request;
use Session;

class HistoricController extends Controller
{
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
        $user = Auth::user();

        $historic = new Historic();
        $historic->product_id = $request->product_id;
        $historic->user_id = $user->id;
        $historic->status = $request->status;
        $historic->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \Doomus\Historic  $historic
     * @return \Illuminate\Http\Response
     */
    public function show(Historic $historic)
    {
        $historic_of_user = $historic->id;

        return view('admin.historic.show')->with('historic', $historic_of_user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Doomus\Historic  $historic
     * @return \Illuminate\Http\Response
     */
    public function edit(Historic $historic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Doomus\Historic  $historic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Historic $historic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Doomus\Historic  $historic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Historic $historic)
    {
        $historic_of_user = $historic->id;
        $historic_of_user->destroy();

        Session::flash('status', 'Histórico apagado com sucesso');

        return back();
    }
}

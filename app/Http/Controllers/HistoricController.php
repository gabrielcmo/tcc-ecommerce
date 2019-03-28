<?php

namespace Doomus\Http\Controllers;

use Doomus\Models\Historic;
use Illuminate\Http\Request;

class HistoricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Historic::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $id_p
     * @param  $status
     * @return \Illuminate\Http\Response
     */
    public static function store($id_p, $id_status)
    {
        if(is_array($id_p) && is_array($status)) {
            $h = [];
            for ($i=0; $i < count($id_p); $i++) { 
                $h[$i] = new Historic();
                $h[$i]->id_product = $id_p[$i];
                $h[$i]->id_status = $id_status[$i];
                $h[$i]->save();
            }
        }else {
            $historic =  new Historic();
            $historic->id_product = $id_p;
            $historic->id_status = $id_status;
            $historic->save();
        }
        return $historic->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Doomus\Historic  $historic
     * @return \Illuminate\Http\Response
     */
    public function show(Historic $historic)
    {
        return Historic::find($historic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Doomus\Historic  $historic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Historic $historic)
    {
        $hist = Historic::find($historic->id);
        $hist->delete();
        return;
    }
}

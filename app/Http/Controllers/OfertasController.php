<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;

class OfertasController extends Controller
{
    public function viewExplore(){
        return view('explore');
    }

    public function view(){
        return view('ofertas');
    }

    public function viewCustomize(){
        return view('customizeQuarto');
    }
}

<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Doomus\Cupom;
use Session;

class CupomController extends Controller
{
    public function validateCupom ()
    {
        if($request->ajax()){
            
            $procurar_cupom = Cupom::where('name', $request->get('queryCupom'))->first();

            if(is_null($procurar_cupom) || $procurar_cupom == "" || $procurar_cupom == null){
                Session::flash('status', 'Esse cupom não é válido');
                Session::flash('status-type', 'danger');
                return back();
            }elseif(session('cupom') == $request->get('queryCupom')){
                Session::flash('status', 'Você já adicionou esse cupom');
                Session::flash('status-type', 'danger');
                return back();
            }else{
                Session::put('cupom', $procurar_cupom);
                return response()->json(['textStatus' => 'success', 'cupom' => $procurar_cupom, 'cartTotal' => Cart::total()]);
            }
        }
    }

    public function create () 
    {
        return view('cupom.create');
    }

    public function store (Request $request) 
    {
        $cupom = new Cupom();

        $cupom->name = strtoupper($request->input('nome'));
        $cupom->fornecido_por = strtoupper($request->input('fornecido_por'));
        $cupom->desconto = $request->input('desconto');
        $cupom->save();

        Session::flash('status', 'Cupom criado com sucesso!');
        return redirect('/admin');
    }

    public function destroy ($id) 
    {
        $cupom = Cupom::find($id);
        $cupom->delete();

        Session::flash('status', 'Cupom excluído com sucesso!');
        return back();
    }
}

<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Doomus\Product;
use Doomus\Order;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function products(){
        $products = Product::all();

        $array[] = ['Product ID', 'Nome', 'Quantidade', 'Valor', 'Categoria'];

        foreach($products as $key => $data){
            $array[] = [$data->id, $data->name, $data->qtd_last, $data->price, $data->category->name];
        }

        return view('admin.products')->with('products', json_encode($array));    
    }

    public function orders(){
        return view('admin.orders')->with('orders', Order::all());
    }

    public function support(){
        // return view('support')->with('messages', Support::all());
        return view('admin.support');
    }
}

<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Doomus\Product;
use Doomus\Order;
use Doomus\Historic;

class AdminController extends Controller
{
    public function index(){
        for($i = 1; $i <= 12; $i++){
            $qtdPedidosMes_chart[$i] = Order::all()->count();
        }

        $qtdPedidosStatus_chart = [
            'Aprovados' => Historic::all()->count(),
            'Em andamento' => Order::all()->count(),
            'Recusados' => Historic::where('status_id', 2)->count()
        ];

        return view('admin.index')->with('qtdPedidosStatus', json_encode($qtdPedidosStatus_chart))->with('qtdPedidosMes', json_encode($qtdPedidosMes_chart));
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

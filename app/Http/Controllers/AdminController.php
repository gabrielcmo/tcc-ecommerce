<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Doomus\Product;
use Doomus\Order;
use Doomus\Historic;

class AdminController extends Controller
{
    public function index(){
        $qtdPedidosMes_chart[] = ['Mês', 'Quantidade de pedidos', 'Esperado'];
        for($i = 1; $i <= 6; $i++){
            $qtdPedidosMes_chart[] = [$i, rand(20, 70), rand(10,100)];
        }

        $qtdPedidosStatus_chart[] = ['Pedidos e status', 'Quantidade de pedidos'];
        $qtdPedidosStatus_chart[] = ['Aprovados', 220];
        $qtdPedidosStatus_chart[] = ['Em andamento', 60];
        $qtdPedidosStatus_chart[] = ['Recusados', 120];

        $arrayqtdMes = $qtdPedidosMes_chart;
        $arrayqtdStatus = $qtdPedidosStatus_chart;

        return view('admin.index')->with('qtdPedidosStatus', json_encode($arrayqtdStatus))->with('qtdPedidosMes', json_encode($arrayqtdMes));
    }

    public function products(){
        $products = Product::all();

        $array[] = ['ID Produto', 'Nome', 'Quantidade', 'Valor', 'Categoria'];

        foreach($products as $key => $data){
            $array[] = [$data->id, $data->name, $data->qtd_last, $data->price, $data->category->name];
        }

        return view('admin.products')->with('products', json_encode($array));    
    }

    public function orders(){
        $orders = Order::all();

        $array[] = ['ID Pedido', 'Produto', 'Usuário', 'Status', 'Método de Pagamento'];

        foreach($orders as $order){
            $array[] = [$order->id, $order->products()->count(), $order->user->id, true, $order->payment_method->name];
        }
        
        return view('admin.orders')->with('orders', json_encode($array));
    }

    // public function support(){
    //     $arrayMessages[] = ['ID Mensagem', 'ID Usuário', 'Email', 'Nome', 'Assunto'];
        
    //     for($i = 1; $i <= 20; $i++){
    //         $arrayMessages[] = [$i, $i, 'gabriel@doomus.com', 'Gabriel', 'Meu pedido'];
    //     }

    //     return view('admin.support')->with('messages', json_encode($arrayMessages));
    // }
}

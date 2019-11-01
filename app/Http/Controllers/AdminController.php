<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Doomus\Product;
use Doomus\Order;
use Doomus\Cupom;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;

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

        return view('layouts.admin')->with('qtdPedidosStatus', json_encode($arrayqtdStatus))->with('qtdPedidosMes', json_encode($arrayqtdMes));
    }

    public function products(){
        $products = Product::all();

        $array[] = ['ID Produto', 'Nome', 'Quantidade', 'Valor', 'Categoria'];

        foreach($products as $data){
            $array[] = [$data->id, $data->name, $data->qtd_last, $data->price, $data->category->name];
        }

        return view('admin.products')->with('products', json_encode($array));    
    }

    public function ofertaProdutoView($product_id){
        return view('admin.productDesconto')->with('product_id', $product_id);
    }

    public function ofertaCategoriaView(){
        return view('admin.categoryDesconto')->with('category_id', $category_id);
    }

    public function cupomView(){
        $cupons = Cupom::all();

        $array[] = ['ID Cupom', 'Nome', 'Fornecido por', 'Desconto'];

        foreach($cupons as $data){
            $array[] = [$data->id, $data->name, $data->fornecido_por, "$data->desconto%"];
        }

        return view('admin.cupons')->with('cupons', json_encode($array));
    }

    public function cupomValidate(Request $request){

        if($request->ajax()){
            
            $procurar_cupom = Cupom::where('name', $request->get('queryCupom'))->first();
            
            if(is_null($procurar_cupom) || $procurar_cupom == "" || $procurar_cupom == null){
                return response()->json(['textStatus' => 'error']);
            }else{
                Session::put('cupom', $procurar_cupom);
                return response()->json(['textStatus' => 'success', 'cupom' => $procurar_cupom, 'cartTotal' => Cart::total()]);
            }
        }
    }

    // Aplicar desconto a um determinado produto
    public function ofertaProduto(Request $data){
        $desconto = $data->desconto * 0.01;
        $product = Product::find($data->product_id);
        $product->price = $product->price - ($product->price * $desconto);
        $product->save();
        return redirect('/admin/products');
    }

    // Aplicar desconto a toda uma categoria
    public function ofertaCategoria($categoria_id, $desconto){
        $products = Product::where('category_id', $categoria_id);

        foreach($products as $product){
            $product->price = $product->price - ($product->price * $desconto);
            $product->save();
        }
        return back();
    }

    public function orders(){
        $orders = Order::all();

        $array[] = ['ID Pedido', 'ID Produtos', 'Usuário', 'Status', 'Método de Pagamento'];

        foreach($orders as $order){
            $products = "";
            $i = 1;
            foreach($order->product as $item){
                $products .= $i == count($order->product) ? $item->id. "." : $item->id. ", ";
                $i++;
            }

            $array[] = [$order->id, $products, $order->user->id, $order->status->name, $order->payment_method->name];
        }
        
        return view('admin.orders')->with('orders', json_encode($array));
    }
}
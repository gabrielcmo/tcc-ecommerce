<?php
namespace Doomus\Http\Controllers;
use Illuminate\Http\Request;
use Doomus\Product;
use Doomus\Order;
use Doomus\Cupom;
use Doomus\Ticket;
use Session;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
class AdminController extends Controller
{
    public function index(){
        // Gráficos
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
        $dadosChart = [
            'qtdPedidosMes' => json_encode($arrayqtdMes),
            'qtdPedidosStatus' => json_encode($arrayqtdStatus),
            'products' => self::products(),
            'orders' => self::orders(),
            'cupons' => self::cupomView(),
            'tickets' => self::ticketView()
        ];
        return view('layouts.admin')->with('dadosChart', $dadosChart);
    }

    public function ticketView () {
        $ticketData = Ticket::all();

        $arrayTickets[] = ['ID', 'Assunto', 'Tipo', 'Mensagem', 'Resposta', 'Data de criação', 'Data de resposta', 'Usuário'];
        
        foreach($ticketData as $data){
            $creation_date = DateTime::createFromFormat('Y-m-d H:i:s', $data->creation_date);
            if (!is_null($data->response_date)) {
                $response_date = DateTime::createFromFormat('Y-m-d H:i:s', $data->response_date);
                $response_date_formatted = $response_date->format('d/m/Y H:i:s');
            } else {
                $response_date_formatted = '';
            }
            $arrayTickets[] = [$data->id, $data->subject, $data->ticket_type->name, $data->message, $data->response, $creation_date->format('d/m/Y H:i:s'), $response_date_formatted, $data->user->email];
        }

        return json_encode($arrayTickets);    
    }

    public static function products(){
        $products = Product::all();
        
        $arrayP[] = ['ID Produto', 'Nome', 'Quantidade', 'Valor', 'Categoria'];
        
        foreach($products as $data){
            $arrayP[] = [$data->id, $data->name, $data->qtd_last, $data->price, $data->category->name];
        }

        return json_encode($arrayP);    
    }

    public function ofertaProdutoView($product_id){
        return view('admin.productDesconto')->with('product_id', $product_id);
    }

    public function ofertaCategoriaView(){
        return view('admin.categoryDesconto');
    }

    public function cupomView(){
        $cupons = Cupom::all();
        
        $array[] = ['ID Cupom', 'Nome', 'Fornecido por', 'Desconto'];
        
        foreach($cupons as $data){
            $array[] = [$data->id, $data->name, $data->fornecido_por, "$data->desconto%"];
        
        }
        return json_encode($array);
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
    public function ofertaCategoria(Request $request){
        $products = Product::where('category_id', $request->categoria_id)->get();
        
        $desconto = $request->desconto * 0.01;
        
        foreach($products as $product){
            $product->price = ($product->price - ($product->price * $desconto));
            $product->save();
        }
        Session::flash('status', 'Desconto aplicado com sucesso!');
        return redirect('/admin');
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
        
        return json_encode($array);
    }
}
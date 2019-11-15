<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'client',
        ]);
        DB::table('cupons')->insert([
            'name' => 'TOGURO',
            'fornecido_por' => 'TOGURO',
            'desconto' => 10,
        ]);
        DB::table('roles')->insert([
            'name' => 'employee',
        ]);

        DB::table('users')->insert([
            'name' => 'Cliente',
            'email' => 'cliente'.'@doomus.com',
            'password' => bcrypt('secret'),
            'role_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'Gabriel',
            'email' => 'gabriel'.'@doomus.com',
            'cep' => 13835000,
            'bairro' => 'Centro',
            'cidade' => 'Conchal',
            'estado' => 'SP',
            'endereco' => 'Cons. Rodrigues Alves',
            'numero' => 17,
            'password' => bcrypt('secret'),
            'role_id' => 1,
        ]);
        
        DB::table('users')->insert([
            'name' => 'Geovanne',
            'email' => 'geovanne'.'@doomus.com',
            'password' => bcrypt('secret'),
            'role_id' => 1,
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Cama',
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Mesa',
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Banho',
        ]);
        
        DB::table('payment_methods')->insert([
            'name' => 'Paypal',
        ]);

        DB::table('products')->insert([
            'nome' => 'Toalha de rosto',
            'descricao' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_restante' => 4,
            'largura' => 12.0,
            'peso' => 20.3,
            'comprimento' => 50.0,
            'altura' => 20.0,
            'diametro' => 80.0,
            'valor' => 4.99,
            'categoria_id' => 3,
        ]);
        
        DB::table('products')->insert([
            'nome' => 'Edredom',
            'descricao' => 'Com ótimo material, é excelente para esquentar sua noite',
            'qtd_restante' => 33,
            'largura' => 12.0,
            'peso' => 466.2,
            'comprimento' => 200.0,
            'altura' => 150.0,
            'diametro' => 80.0,
            'valor' => 79.99,
            'categoria_id' => 1,
        ]);
        
        DB::table('products')->insert([
            'nome' => 'Travesseiro',
            'descricao' => 'Grande e maravilhoso',
            'qtd_restante' => 1,
            'largura' => 12.0,
            'peso' => 250.0,
            'comprimento' => 45.0,
            'altura' => 25.0,
            'diametro' => 80.0,
            'valor' => 39.98,
            'categoria_id' => 1,
        ]);

        DB::table('products')->insert([
            'nome' => 'Tapete',
            'descricao' => 'ótimo',
            'qtd_restante' => 37,
            'largura' => 12.0,
            'peso' => 125.0,
            'comprimento' => 20.0,
            'altura' => 2.0,
            'valor' => 19.99,
            'categoria_id' => 2,
        ]);
        
        DB::table('products')->insert([
            'nome' => 'Cortina',
            'descricao' => 'ótimo',
            'qtd_restante' => 37,
            'largura' => 12.0,
            'peso' => 125.0,
            'comprimento' => 20.0,
            'altura' => 2.0,
            'valor' => 19.99,
            'categoria_id' => 2,
        ]);
        
        DB::table('products')->insert([
            'nome' => 'Roupão',
            'descricao' => 'Longo e sedoso para te aquecer/secar após o banho',
            'qtd_restante' => 60,
            'largura' => 50.0,
            'peso' => 750.0,
            'comprimento' => 30.0,
            'altura' => 120.0,
            'valor' => 49.99,
            'categoria_id' => 3,
        ]);

        DB::table('products')->insert([
            'nome' => 'Cobertor Azul',
            'descricao' => 'Te aquece nas suas noites mais frias',
            'qtd_restante' => 98,
            'largura' => 1.0,
            'peso' => 560.0,
            'comprimento' => 135.0,
            'altura' => 200.0,
            'valor' => 79.98,
            'categoria_id' => 1,
        ]);
        
        DB::table('products')->insert([
            'nome' => 'Quadro',
            'descricao' => 'Pintura linda',
            'qtd_restante' => 98,
            'largura' => 1.0,
            'peso' => 560.0,
            'comprimento' => 135.0,
            'altura' => 200.0,
            'valor' => 49.99,
            'categoria_id' => 1,
        ]);

        DB::table('product_images')->insert([
            'filename' => 'placeholder-2.jpg',
            'product_id' => 1,
        ]);

        DB::table('product_images')->insert([
            'filename' => 'placeholder-1.jpg',
            'product_id' => 2,
        ]);

        DB::table('product_images')->insert([
            'filename' => 'placeholder-3.jpg',
            'product_id' => 3,
        ]);

        DB::table('product_images')->insert([
            'filename' => 'placeholder-4.jpg',
            'product_id' => 4,
        ]);

        DB::table('order_statuses')->insert([
            'name' => 'Processando pagamento',
        ]);

        DB::table('order_statuses')->insert([
            'name' => 'Pagamento aprovado',
        ]);
        
        DB::table('order_statuses')->insert([
            'name' => 'Em transporte',
        ]);
        
        DB::table('order_statuses')->insert([
            'name' => 'Entregue',
        ]);

        DB::table('order_statuses')->insert([
            'name' => 'Cancelado',
        ]);
        
        DB::table('orders')->insert([
            'user_id' => 1,
            'status_id' => 4,
            'data_realizado' => date('Y-m-d')." ".date('H:i:s'),
            'data_aprovado' => date('Y-m-d')." ".date('H:i:s'),
            'data_despache' => date('Y-m-d')." ".date('H:i:s'),
            'data_entrega' => date('Y-m-d')." ".date('H:i:s'),
            'cep' => 13835000,
            'endereco' => "Cons. Rodrigues Alves",
            'numero' => 17,
            'bairro' => "Centro",
            'cidade' => "Conchal",
            'estado' => "SP",
            'payment_method_id' => 1,
            'value_total' => 200,
            'frete' => 30.22,
            'prazo' => 3
        ]);
        
        DB::table('orders')->insert([
            'user_id' => 2,
            'status_id' => 4,
            'data_realizado' => date('Y-m-d')." ".date('H:i:s'),
            'data_aprovado' => date('Y-m-d')." ".date('H:i:s'),
            'data_despache' => date('Y-m-d')." ".date('H:i:s'),
            'data_entrega' => date('Y-m-d')." ".date('H:i:s'),
            'cep' => 13835000,
            'endereco' => "Cons. Rodrigues Alves",
            'numero' => 17,
            'bairro' => "Centro",
            'cidade' => "Conchal",
            'estado' => "SP",
            'payment_method_id' => 1,
            'value_total' => 200,
            'frete' => 30.22,
            'prazo' => 3
        ]);
        
        DB::table('orders')->insert([
            'user_id' => 2,
            'status_id' => 5,
            'data_realizado' => date('Y-m-d')." ".date('H:i:s'),
            'data_aprovado' => date('Y-m-d')." ".date('H:i:s'),
            'data_despache' => date('Y-m-d')." ".date('H:i:s'),
            'data_cancelado' => date('Y-m-d')." ".date('H:i:s'),
            'cep' => 13835000,
            'endereco' => "Cons. Rodrigues Alves",
            'numero' => 17,
            'bairro' => "Centro",
            'cidade' => "Conchal",
            'estado' => "SP",
            'payment_method_id' => 1,
            'value_total' => 35,
            'frete' => 30.22,
            'prazo' => 3
        ]);
        
        DB::table('orders')->insert([
            'user_id' => 2,
            'status_id' => 2,
            'data_realizado' => date('Y-m-d')." ".date('H:i:s'),
            'data_aprovado' => date('Y-m-d')." ".date('H:i:s'),
            'cep' => 13835000,
            'endereco' => "Cons. Rodrigues Alves",
            'numero' => 17,
            'bairro' => "Centro",
            'cidade' => "Conchal",
            'estado' => "SP",
            'payment_method_id' => 1,
            'value_total' => 341,
            'frete' => 30.22,
            'prazo' => 3
        ]);
        
        DB::table('orders')->insert([
            'user_id' => 2,
            'status_id' => 1,
            'data_realizado' => date('Y-m-d')." ".date('H:i:s'),
            'cep' => 13835000,
            'endereco' => "Cons. Rodrigues Alves",
            'numero' => 17,
            'bairro' => "Centro",
            'cidade' => "Conchal",
            'estado' => "SP",
            'payment_method_id' => 1,
            'value_total' => 75,
            'frete' => 30.22,
            'prazo' => 3
        ]);
        
        DB::table('order_product')->insert([
            'product_id' => 1,
            'order_id' => 1,
            'qty' => 2,
            'price' => 133
        ]);
        
        DB::table('order_product')->insert([
            'product_id' => 2,
            'order_id' => 1,
            'qty' => 4,
            'price' => 20
        ]);
        
        DB::table('order_product')->insert([
            'product_id' => 3,
            'order_id' => 2,
            'qty' => 2,
            'price' => 133
        ]);

        DB::table('order_product')->insert([
            'product_id' => 6,
            'order_id' => 3,
            'qty' => 1,
            'price' => 133
        ]);

        DB::table('order_product')->insert([
            'product_id' => 5,
            'order_id' => 3,
            'qty' => 5,
            'price' => 53
        ]);

        DB::table('order_product')->insert([
            'product_id' => 2,
            'order_id' => 4,
            'qty' => 7,
            'price' => 13
        ]);

        DB::table('order_product')->insert([
            'product_id' => 2,
            'order_id' => 3,
            'qty' => 1,
            'price' => 30
        ]);

        DB::table('order_product')->insert([
            'product_id' => 3,
            'order_id' => 3,
            'qty' => 1,
            'price' => 120
        ]);

        DB::table('order_product')->insert([
            'product_id' => 2,
            'order_id' => 5,
            'qty' => 10,
            'price' => 19.99
        ]);

        DB::table('product_images')->insert([
            'filename' => 'roupao1.png',
            'product_id' => 6,
        ]);

        DB::table('product_images')->insert([
            'filename' => 'roupao2.png',
            'product_id' => 6,
        ]);

        DB::table('product_images')->insert([
            'filename' => 'roupao3.png',
            'product_id' => 6,
        ]);

        DB::table('product_images')->insert([
            'filename' => 'cama.png',
            'product_id' => 7,
        ]);

        DB::table('ticket_types')->insert([
            'name' => 'Problemas com algum pedido'
        ]);

        DB::table('ticket_types')->insert([
            'name' => 'Problemas técnicos'
        ]);

        DB::table('ticket_types')->insert([
            'name' => 'Problemas ao confirmar a compra'
        ]);

        DB::table('tickets')->insert([
            'message' => 'Não consigo logar',
            'status' => 0,
            'ticket_type_id' => 2,
            'creation_date' => new DateTime(),
            'subject' => 'Socorro',
            'user_id' => 2,
        ]);

        DB::table('tickets')->insert([
            'message' => 'Meu pedido não chegouuu!!',
            'status' => 0,
            'ticket_type_id' => 1,
            'creation_date' => new DateTime(),
            'subject' => 'Me ajuda',
            'user_id' => 3,
        ]);
    }
}
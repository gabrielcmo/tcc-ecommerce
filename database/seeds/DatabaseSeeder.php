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
            'name' => 'Toalha de rosto',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
        ]);

        DB::table('products')->insert([
            'name' => 'Edredom',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
        ]);

        DB::table('products')->insert([
            'name' => 'Travesseiro',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
        ]);

        DB::table('products')->insert([
            'name' => 'Toalha de rosto',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
        ]);

        DB::table('products')->insert([
            'name' => 'Tapete',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
        ]);

        DB::table('products')->insert([
            'name' => 'Cortina',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
        ]);

        DB::table('products')->insert([
            'name' => 'Roupão',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
        ]);

        DB::table('products')->insert([
            'name' => 'Cobertor azul',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
        ]);

        DB::table('products')->insert([
            'name' => 'Quadro',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'weight' => 12.0,
            'lenght' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
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
            'product_id' => 7,
            'order_id' => 3,
            'qty' => 1,
            'price' => 133
        ]);

        DB::table('order_product')->insert([
            'product_id' => 6,
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
            'product_id' => 5,
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
            'product_id' => 8,
            'order_id' => 5,
            'qty' => 10,
            'price' => 19.99
        ]);
        
        DB::table('products')->insert([
            'name' => 'Roupão',
            'description' => 'Longo e sedoso para te aquecer/secar após o banho',
            'qtd_last' => 60,
            'lenght' => 50.0,
            'weight' => 750.0,
            'width' => 30.0,
            'height' => 120.0,
            'price' => 49.99,
            'category_id' => 3,
        ]);

        DB::table('products')->insert([
            'name' => 'Cobertor Azul',
            'description' => 'Te aquece nas suas noites mais frias',
            'qtd_last' => 98,
            'lenght' => 1.0,
            'weight' => 560.0,
            'width' => 135.0,
            'height' => 200.0,
            'price' => 79.98,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'name' => 'Moldura',
            'description' => 'Uma moldura de qualidade para sua pintura',
            'qtd_last' => 30,
            'lenght' => 1.5,
            'weight' => 500,
            'width' => 150,
            'height' => 210,
            'price' => 50,
            'discount' => 0.5,
            'category_Id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Almofada NASA',
            'description' => 'Uma moldura de qualidade para sua pintura',
            'qtd_last' => 30,
            'lenght' => 1.5,
            'weight' => 500,
            'width' => 150,
            'height' => 210,
            'price' => 50,
            'discount' => 0.5,
            'category_Id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Estante',
            'description' => 'Uma moldura de qualidade para sua pintura',
            'qtd_last' => 30,
            'lenght' => 1.5,
            'weight' => 500,
            'width' => 150,
            'height' => 210,
            'price' => 50,
            'discount' => 0.5,
            'category_Id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Sofá',
            'description' => 'Uma moldura de qualidade para sua pintura',
            'qtd_last' => 30,
            'lenght' => 1.5,
            'weight' => 500,
            'width' => 150,
            'height' => 210,
            'price' => 50,
            'discount' => 0.5,
            'category_Id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Piso SU.PER',
            'description' => 'Uma moldura de qualidade para sua pintura',
            'qtd_last' => 30,
            'lenght' => 1.5,
            'weight' => 500,
            'width' => 150,
            'height' => 210,
            'price' => 50,
            'discount' => 0.4,
            'category_Id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Quadro ESC',
            'description' => 'Uma moldura de qualidade para sua pintura',
            'qtd_last' => 30,
            'lenght' => 1.5,
            'weight' => 500,
            'width' => 150,
            'height' => 210,
            'price' => 50,
            'discount' => 0.4,
            'category_Id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Televisão',
            'description' => 'Uma moldura de qualidade para sua pintura',
            'qtd_last' => 30,
            'lenght' => 1.5,
            'weight' => 500,
            'width' => 150,
            'height' => 210,
            'price' => 50,
            'discount' => 0.4,
            'category_Id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Fogão',
            'description' => 'Uma moldura de qualidade para sua pintura',
            'qtd_last' => 30,
            'lenght' => 1.5,
            'weight' => 500,
            'width' => 150,
            'height' => 210,
            'price' => 50,
            'discount' => 0.4,
            'category_Id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Pia AGUA',
            'description' => 'Uma moldura de qualidade para sua pintura',
            'qtd_last' => 30,
            'lenght' => 1.5,
            'weight' => 500,
            'width' => 150,
            'height' => 210,
            'price' => 50,
            'discount' => 0.1,
            'category_Id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Torneira',
            'description' => 'Uma moldura de qualidade para sua pintura',
            'qtd_last' => 30,
            'lenght' => 1.5,
            'weight' => 500,
            'width' => 150,
            'height' => 210,
            'price' => 50,
            'discount' => 0.1,
            'category_Id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Conjunto de panelas',
            'description' => 'Uma moldura de qualidade para sua pintura',
            'qtd_last' => 30,
            'lenght' => 1.5,
            'weight' => 500,
            'width' => 150,
            'height' => 210,
            'price' => 50,
            'discount' => 0.1,
            'category_Id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Toalha MANIACA',
            'description' => 'Uma moldura de qualidade para sua pintura',
            'qtd_last' => 30,
            'lenght' => 1.5,
            'weight' => 500,
            'width' => 150,
            'height' => 210,
            'price' => 50,
            'discount' => 0.1,
            'category_Id' => 1
        ]);
        
        DB::table('products')->insert([
            'name' => 'Quadro',
            'description' => 'Pintura linda',
            'qtd_last' => 98,
            'lenght' => 1.0,
            'weight' => 560.0,
            'width' => 135.0,
            'height' => 200.0,
            'price' => 49.99,
            'category_id' => 1,
        ]);

        DB::table('product_images')->insert([
            'filename' => 'roupao1.png',
            'product_id' => 9,
        ]);

        DB::table('product_images')->insert([
            'filename' => 'roupao2.png',
            'product_id' => 9,
        ]);

        DB::table('product_images')->insert([
            'filename' => 'roupao3.png',
            'product_id' => 9,
        ]);

        DB::table('product_images')->insert([
            'filename' => 'cama.png',
            'product_id' => 10,
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
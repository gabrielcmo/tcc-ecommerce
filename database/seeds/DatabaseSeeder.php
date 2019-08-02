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
            'name' => 'paypal',
        ]);

        DB::table('products')->insert([
            'name' => 'Toalha de rosto',
            'description' => 'Produto made in Taiwan, de ótima qualidade e resistência. É excelente por sua longevidade',
            'qtd_last' => 4,
            'lenght' => 12.0,
            'weight' => 20.3,
            'width' => 50.0,
            'height' => 20.0,
            'diameter' => 80.0,
            'price' => 4.99,
            'category_id' => 3,
        ]);
        
        DB::table('products')->insert([
            'name' => 'Edredom',
            'description' => 'Com ótimo material, é excelente para esquentar sua noite',
            'qtd_last' => 33,
            'lenght' => 12.0,
            'weight' => 466.2,
            'width' => 200.0,
            'height' => 150.0,
            'diameter' => 80.0,
            'price' => 79.99,
            'category_id' => 1,
        ]);
        
        DB::table('products')->insert([
            'name' => 'Travesseiro',
            'description' => 'Grande e maravilhoso',
            'qtd_last' => 1,
            'lenght' => 12.0,
            'weight' => 250.0,
            'width' => 45.0,
            'height' => 25.0,
            'diameter' => 80.0,
            'price' => 39.98,
            'category_id' => 1,
        ]);
        
        DB::table('products')->insert([
            'name' => 'Colher de silicone',
            'description' => 'Colher ótima',
            'qtd_last' => 37,
            'lenght' => 12.0,
            'weight' => 125.0,
            'width' => 20.0,
            'height' => 2.0,
            'price' => 19.99,
            'category_id' => 2,
        ]);
        
        DB::table('products')->insert([
            'name' => 'Colher de pau',
            'description' => 'Colher ótima',
            'qtd_last' => 37,
            'lenght' => 12.0,
            'weight' => 125.0,
            'width' => 20.0,
            'height' => 2.0,
            'price' => 19.99,
            'category_id' => 2,
        ]);
        
        DB::table('products')->insert([
            'name' => 'Tapete',
            'description' => 'ótimo',
            'qtd_last' => 37,
            'lenght' => 12.0,
            'weight' => 125.0,
            'width' => 20.0,
            'height' => 2.0,
            'price' => 19.99,
            'category_id' => 2,
        ]);
        
        DB::table('products')->insert([
            'name' => 'Cortina',
            'description' => 'ótimo',
            'qtd_last' => 37,
            'lenght' => 12.0,
            'weight' => 125.0,
            'width' => 20.0,
            'height' => 2.0,
            'price' => 19.99,
            'category_id' => 2,
        ]);
        
        DB::table('products')->insert([
            'name' => 'Conjunto talheres',
            'description' => 'ótimo',
            'qtd_last' => 37,
            'lenght' => 12.0,
            'weight' => 125.0,
            'width' => 20.0,
            'height' => 2.0,
            'price' => 19.99,
            'category_id' => 2,
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

        DB::table('historic_statuses')->insert([
            'name' => 'denied',
        ]);

        DB::table('historic_statuses')->insert([
            'name' => 'approved',
        ]);

        DB::table('historic_statuses')->insert([
            'name' => 'cancelled',
        ]);

        DB::table('historics')->insert([
            'user_id' => 1,
            'qty' => 2,
            'product_id' => 2,
            'status_id' => 2,
        ]);
        
        DB::table('historics')->insert([
            'user_id' => 1,
            'qty' => 6,
            'product_id' => 2,
            'status_id' => 2,
        ]);

        DB::table('historics')->insert([
            'user_id' => 2,
            'qty' => 2,
            'product_id' => 3,
            'status_id' => 1,
        ]);
        
        DB::table('historics')->insert([
            'user_id' => 2,
            'qty' => 1,
            'product_id' => 2,
            'status_id' => 3,
        ]);
        
        DB::table('historics')->insert([
            'user_id' => 2,
            'qty' => 4,
            'product_id' => 1,
            'status_id' => 2,
        ]);
        
        DB::table('orders')->insert([
            'user_id' => 1,
            'payment_method_id' => 1
        ]);
        
        DB::table('orders')->insert([
            'user_id' => 2,
            'payment_method_id' => 1
        ]);
        
        DB::table('order_product')->insert([
            'product_id' => 1,
            'order_id' => 1,
            'qty' => 2,
            'price' => 133,
            'value_total' => 200
        ]);
        
        DB::table('order_product')->insert([
            'product_id' => 2,
            'order_id' => 1,
            'qty' => 4,
            'price' => 20,
            'value_total' => 50.22
        ]);
        
        DB::table('order_product')->insert([
            'product_id' => 3,
            'order_id' => 2,
            'qty' => 2,
            'price' => 133,
            'value_total' => 200
        ]);
        
        DB::table('order_product')->insert([
            'product_id' => 1,
            'order_id' => 2,
            'qty' => 2,
            'price' => 133,
            'value_total' => 200
        ]);
    }
}
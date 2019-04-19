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
        DB::table('carts')->insert(['session' => Str::random(10)]);
        DB::table('carts')->insert(['session' => Str::random(10)]);

        DB::table('roles')->insert([
            'name' => 'client',
        ]);
        DB::table('roles')->insert([
            'name' => 'employee',
        ]);

        DB::table('users')->insert([
            'image' => 'user-placeholder.jpg',
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'cart_id' => 1,
            'role_id' => 2,
        ]);
        
        DB::table('users')->insert([
            'image' => 'user-placeholder.jpg',
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'cart_id' => 2,
            'role_id' => 1,
        ]);
        
        DB::table('categories')->insert([
            'name' => Str::random(10),
        ]);
        
        DB::table('categories')->insert([
            'name' => Str::random(10),
        ]);
        
        DB::table('payment_methods')->insert([
            'name' => Str::random(10),
        ]);

        DB::table('products')->insert([
            'name' => Str::random(10),
            'details' => Str::random(10),
            'description' => Str::random(10),
            'qtd_last' => 3,
            'weight' => 2000.0,
            'width' => 100.0,
            'height' => 200.0,
            'category_id' => 2,
            'payment_method_id' => 1,
        ]);
        
        DB::table('products')->insert([
            'name' => Str::random(10),
            'details' => Str::random(10),
            'description' => Str::random(10),
            'qtd_last' => 3,
            'weight' => 2000.0,
            'width' => 100.0,
            'height' => 200.0,
            'category_id' => 2,
            'payment_method_id' => 1,
        ]);
        
        DB::table('products')->insert([
            'name' => Str::random(10),
            'details' => Str::random(10),
            'description' => Str::random(10),
            'qtd_last' => 3,
            'weight' => 2000.0,
            'width' => 100.0,
            'height' => 200.0,
            'category_id' => 2,
            'payment_method_id' => 1,
        ]);
        
        DB::table('products')->insert([
            'name' => Str::random(10),
            'details' => Str::random(10),
            'description' => Str::random(10),
            'qtd_last' => 3,
            'weight' => 2000.0,
            'width' => 100.0,
            'height' => 200.0,
            'category_id' => 2,
            'payment_method_id' => 1,
        ]);
        
        DB::table('products')->insert([
            'name' => Str::random(10),
            'details' => Str::random(10),
            'description' => Str::random(10),
            'qtd_last' => 3,
            'weight' => 2000.0,
            'width' => 100.0,
            'height' => 200.0,
            'category_id' => 2,
            'payment_method_id' => 1,
        ]);

        DB::table('historic_statuses')->insert([
            'name' => 'deny',
        ]);

        DB::table('historic_statuses')->insert([
            'name' => 'ok',
        ]);

        DB::table('historic_statuses')->insert([
            'name' => 'cancelled',
        ]);

        DB::table('historics')->insert([
            'user_id' => 1,
            'product_id' => 2,
            'status_id' => 2,
        ]);

        DB::table('historics')->insert([
            'user_id' => 1,
            'product_id' => 2,
            'status_id' => 1,
        ]);

        DB::table('historics')->insert([
            'user_id' => 1,
            'product_id' => 1,
            'status_id' => 2,
        ]);
    }
}

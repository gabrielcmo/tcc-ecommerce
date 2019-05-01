<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Doomus\Cart;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cart1 = new Cart();
        $cart2 = new Cart();
        $cart3 = new Cart();
        $cart4 = new Cart();
        $cart5 = new Cart();
        $cart1->save();
        $cart2->save();
        $cart3->save();
        $cart4->save();
        $cart5->save();

        DB::table('roles')->insert([
            'name' => 'client',
        ]);
        DB::table('roles')->insert([
            'name' => 'employee',
        ]);

        DB::table('users')->insert([
            'image' => 'user-placeholder.jpg',
            'name' => 'Gabriel',
            'email' => 'gabriel'.'@doomus.com',
            'password' => bcrypt('secret'),
            'cart_id' => 1,
            'role_id' => 2,
        ]);
        
        DB::table('users')->insert([
            'image' => 'user-placeholder.jpg',
            'name' => 'Geovanne',
            'email' => 'geovanne'.'@doomus.com',
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
            'qtd_last' => 1,
            'weight' => 2250.0,
            'width' => 130.0,
            'height' => 20.0,
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

<?php

use Illuminate\Database\Seeder;

class CartProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Doomus\Models\Cart_Product::class, 50)->create()->each(function ($c_p) {
            $c_p->save();
        });
    }
}

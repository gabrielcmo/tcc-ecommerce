<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Doomus\Models\Product::class, 50)->create()->each(function ($product) {
            $product->save();
        });
    }
}

<?php

use Illuminate\Database\Seeder;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Doomus\Models\Cart::class, 50)->create()->each(function ($c) {
            $c->save();
        });
    }
}

<?php

use Faker\Generator as Faker;

$factory->define(Doomus\Models\Cart_Product::class, function (Faker $faker) {
    return [
        'qtd' => $faker->randomDigit,
        'id_product' => $faker->numberBetween(0, 50),
        'id_cart' => $faker->numberBetween(0, 50),
    ];
});

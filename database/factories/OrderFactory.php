<?php

use Faker\Generator as Faker;

$factory->define(Doomus\Models\Order::class, function (Faker $faker) {
    return [
        'id_payment_method' => $faker->numberBetween(0, 1),
        'id_status' => $faker->numberBetween(0, 3),
        'qtd_total' => $faker->randomDigit,
        'value_total' => $faker->numberBetween(1, 100),
        'id_cart_product' => $faker->numberBetween(0, 50),
        'id_cart' => $faker->numberBetween(0, 50),
    ];
});

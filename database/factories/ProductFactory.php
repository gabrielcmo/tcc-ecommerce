<?php

use Faker\Generator as Faker;

$factory->define(Doomus\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text($maxNbChars = 200),
        'value' => $faker->numberBetween(1,100),
        'qtd_in_stock' => $faker->randomDigit,
        'id_category' => $faker->randomDigit,
    ];
});

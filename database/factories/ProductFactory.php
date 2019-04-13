<?php

use Faker\Generator as Faker;

$factory->define(Doomus\Models\Product::class, function (Faker $faker) {
    return [
        'image' => $faker->randomElement(['placeholder-1.jpg', 'placeholder-2.jpg', 'placeholder-3.jpg', 'placeholder-4.jpg']),
        'name' => $faker->name,
        'description' => $faker->text($maxNbChars = 7),
        'value' => $faker->numberBetween(1,200),
        'qtd_in_stock' => $faker->randomDigit,
        'id_category' => $faker->randomDigit,
    ];
});

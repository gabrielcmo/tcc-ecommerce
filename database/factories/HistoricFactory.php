<?php

use Faker\Generator as Faker;

$factory->define(Doomus\Models\Historic::class, function (Faker $faker) {
    return [
        'id_product' => $faker->numberBetween(0, 50),
        'id_status_historic' => $faker->numberBetween(0, 3),
    ];
});

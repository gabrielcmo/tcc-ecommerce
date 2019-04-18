<?php

use Faker\Generator as Faker;

$factory->define(Doomus\HistoricStatus::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

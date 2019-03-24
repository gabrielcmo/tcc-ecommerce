<?php

use Faker\Generator as Faker;

$factory->define(Doomus\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

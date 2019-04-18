<?php

use Faker\Generator as Faker;

$factory->define(Doomus\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

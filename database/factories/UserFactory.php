<?php

use Faker\Generator as Faker;

$factory->define(Doomus\User::class, function (Faker $faker) {
    return [
        'image' => $faker->imageUrl(340, 340),
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => $faker->password,
    ];
});

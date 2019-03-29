<?php

use Illuminate\Support\Str;
use Doomus\Http\Controllers\HistoricController as Historic;
use Doomus\Http\Controllers\CartController as Cart;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Doomus\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$12$UO0MK48VUtYWX/r/l.jqf.9BNUVhCr9ie9BiIG7vrasnlGUH8IU2O', // secret
        'id_historic' => Historic::store($faker->numberBetween(0, 25), $faker->numberBetween(0, 3)),
        'id_cart' => Cart::store(),
        'remember_token' => Str::random(10),
    ];
});

<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Doomus\User::class, 50)->create()->each(function ($user) {
            $user->cart()->save(factory(Doomus\Cart::class)->make());
            $user->role()->save(factory(Doomus\Role::class)->make());
        });
    }
}

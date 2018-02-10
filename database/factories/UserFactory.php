<?php

use DCStore\UserType;
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

$factory->define(DCStore\User::class, function (Faker $faker) {
    return [
    	'id' =>$faker->regexify('^[a-zA-Z0-9]{20}$'),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'last_name' => $faker->lastName,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'type' => $faker->randomElement(UserType::all()->pluck('id')->toArray()),
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(DCStore\GenderGame::class, function (Faker $faker) {
    return [
        'gender' => $faker->sentence(1,true),
    ];
});

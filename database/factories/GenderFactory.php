<?php

use Faker\Generator as Faker;

$factory->define(DCStore\Gender::class, function (Faker $faker) {
    return [
        'gender' => $faker->sentence(1,true),
    ];

});

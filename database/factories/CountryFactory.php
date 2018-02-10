<?php

use Faker\Generator as Faker;

$factory->define(DCStore\Country::class, function (Faker $faker) {
    return [
        'country' => $faker->sentence(3,true),
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(DCStore\Quality::class, function (Faker $faker) {
    return [
        'quality' => $faker->sentence(1,true),
    ];
});

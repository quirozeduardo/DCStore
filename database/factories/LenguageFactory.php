<?php

use Faker\Generator as Faker;

$factory->define(DCStore\Lenguage::class, function (Faker $faker) {
    return [
        'lenguage' => $faker->sentence(2,true),
    ];
});

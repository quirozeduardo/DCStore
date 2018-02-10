<?php

use Faker\Generator as Faker;

$factory->define(DCStore\OS::class, function (Faker $faker) {
    return [
        'os' => $faker->sentence(1,true),
    ];
});

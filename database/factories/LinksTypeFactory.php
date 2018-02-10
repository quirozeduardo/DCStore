<?php

use Faker\Generator as Faker;

$factory->define(DCStore\LinksType::class, function (Faker $faker) {
    return [
        'type' => $faker->sentence(1,true),
    ];
});

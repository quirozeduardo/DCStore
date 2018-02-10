<?php

use Faker\Generator as Faker;

$factory->define(DCStore\Server::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence(1,true),
        'icon' => $faker->imageUrl(50, 50),
    ];
});

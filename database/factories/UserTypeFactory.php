<?php

use Faker\Generator as Faker;

$factory->define(DCStore\UserType::class, function (Faker $faker) {
    return [
        'type'=>$faker->sentence(3,true),
        'description'=>$faker->sentence(),
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(DCStore\FormatGame::class, function (Faker $faker) {
    return [
        'format'=>$faker->sentence(1,true),
    ];
});

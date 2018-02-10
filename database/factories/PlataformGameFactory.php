<?php

use Faker\Generator as Faker;

$factory->define(DCStore\PlataformGame::class, function (Faker $faker) {
    return [
        'plataform'=>$faker->sentence(2,true),
    ];
});

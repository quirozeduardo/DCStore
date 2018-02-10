<?php

use Faker\Generator as Faker;

$factory->define(DCStore\Subtitles::class, function (Faker $faker) {
    return [
        'subtitles' => $faker->sentence(2,true),
    ];
});

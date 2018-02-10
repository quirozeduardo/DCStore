<?php

use Faker\Generator as Faker;

$factory->define(DCStore\ArticleType::class, function (Faker $faker) {
    return [
        'type'=>$faker->sentence(2,true),
    ];
});

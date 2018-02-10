<?php

use DCStore\Article;
use Faker\Generator as Faker;

$factory->define(DCStore\Photo::class, function (Faker $faker) {
    return [
    	'id' => $faker->randomElement(Article::all()->pluck('id')->toArray()),
        'photo' => $faker->imageUrl(640, 480),
    ];
});

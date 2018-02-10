<?php

use DCStore\ArticleType;
use DCStore\User;
use Faker\Generator as Faker;

$factory->define(DCStore\Article::class, function (Faker $faker) {
	$idf=$faker->randomElement(User::all()->pluck('id')->toArray());
    return [
    	'id' => $faker->regexify('^[a-zA-Z0-9]{30}$'),
        'type' => $faker->randomElement(ArticleType::all()->pluck('id')->toArray()),
        'image' => $faker->imageUrl(400, 600),
        'created_by' => $idf,
        'updated_by' => $idf,
    ];
});

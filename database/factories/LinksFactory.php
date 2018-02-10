<?php

use DCStore\Article;
use DCStore\LinksType;
use Faker\Generator as Faker;

$factory->define(DCStore\Links::class, function (Faker $faker) {
    return [
    	'id' => $faker->regexify('^[a-zA-Z0-9]{30}$'),
        'article' => $faker->randomElement(Article::all()->pluck('id')->toArray()),
        'type' => $faker->randomElement(LinksType::all()->pluck('id')->toArray()),
        'description'=>$faker->sentence(),
    ];
});

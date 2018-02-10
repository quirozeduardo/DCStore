<?php


use DCStore\Article;
use DCStore\Lenguage;
use Faker\Generator as Faker;

$factory->define(DCStore\InformationSoftware::class, function (Faker $faker) {
    return [
        'id' => factory(Article::class)->create()->id,
        'title' => $faker->sentence(3,true),
        'lenguage' => $faker->randomElement(Lenguage::all()->pluck('id')->toArray()),
        'size' => 3000
    ];
});

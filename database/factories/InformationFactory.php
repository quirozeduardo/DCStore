<?php

use DCStore\Quality;
use DCStore\Format;
use DCStore\Lenguage;
use DCStore\Subtitles;
use DCStore\Article;
use Faker\Generator as Faker;

$factory->define(DCStore\Information::class, function (Faker $faker) {
    return [
        'id' => factory(Article::class)->create()->id,
        'quality' => $faker->randomElement(Quality::all()->pluck('id')->toArray()),
        'format' => $faker->randomElement(Format::all()->pluck('id')->toArray()),
        'resolution_w' => 1200,
        'resolution_h' => 800,
        'size' => 3000,
        'lenguage' => $faker->randomElement(Lenguage::all()->pluck('id')->toArray()),
        'subtitles' => $faker->randomElement(Subtitles::all()->pluck('id')->toArray()),

    ];
});


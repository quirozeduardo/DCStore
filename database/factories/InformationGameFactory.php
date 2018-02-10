<?php

use DCStore\Article;
use DCStore\FormatGame;
use DCStore\PlataformGame;
use DCStore\Lenguage;
use DCStore\GenderGame;

use Faker\Generator as Faker;

$factory->define(DCStore\InformationGame::class, function (Faker $faker) {
    return [
        'id' => factory(Article::class)->create()->id,
        'title' => $faker->sentence(1,true),
        'release_date' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        'format' => $faker->randomElement(FormatGame::all()->pluck('id')->toArray()),
        'plataform' => $faker->randomElement(PlataformGame::all()->pluck('id')->toArray()),
        'size' => 2000,
        'lenguage' => $faker->randomElement(Lenguage::all()->pluck('id')->toArray()),
        'gender' => $faker->randomElement(GenderGame::all()->pluck('id')->toArray()),
    ];
});

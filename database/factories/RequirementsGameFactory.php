<?php

use DCStore\RequirementsGame;
use DCStore\OS;
use DCStore\InformationGame;
use Faker\Generator as Faker;

$factory->define(DCStore\RequirementsGame::class, function (Faker $faker) {
    return [
        'id' => factory(InformationGame::class)->create()->id,
        'os' => $faker->randomElement(OS::all()->pluck('id')->toArray()),
        'cpu' => $faker->sentence(2,true),
        'ram' => 4096,
        'graphics' => $faker->sentence(2,true),
        'opengl' => $faker->sentence(2,true),
        'directx' => $faker->sentence(2,true),
        'disk' => 2046,
    ];
});

<?php

use DCStore\Country;
use Faker\Generator as Faker;
use DCStore\Information;

$factory->define(DCStore\Datasheet::class, function (Faker $faker) {
    return [
        'id' => factory(Information::class)->create()->id,
        'original_title' => $faker->sentence(4,true),
        'another_title' => $faker->sentence(4,true),
        'year' => 1999,
        'duration' => 145,
        'country' => $faker->randomElement(Country::all()->pluck('id')->toArray()),
        'directed' => $faker->sentence(3,true),
        'screenplay' => $faker->sentence(3,true),
        'music' => $faker->sentence(3,true),
        'cinematography' => $faker->sentence(3,true),
        'starring' => $faker->sentence(3,true),
        'production_company' => $faker->sentence(3,true),
    ];
});


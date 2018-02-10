<?php

use DCStore\Gender;
use DCStore\Datasheet;
use Faker\Generator as Faker;

$factory->define(DCStore\Genders::class, function (Faker $faker) {
    return [
    	'id' => factory(Datasheet::class)->create()->id,
        'gender' => $faker->randomElement(Gender::all()->pluck('id')->toArray()),
    ];
});

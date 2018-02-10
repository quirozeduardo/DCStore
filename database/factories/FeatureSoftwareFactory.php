<?php

use DCStore\InformationSoftware;
use Faker\Generator as Faker;

$factory->define(DCStore\FeatureSoftware::class, function (Faker $faker) {
    return [
        'id' => $faker->randomElement(InformationSoftware::all()->pluck('id')->toArray()),
        'feature' => $faker->sentence(),
    ];
});

<?php

use DCStore\Links;
use DCStore\Server;
use Faker\Generator as Faker;

$factory->define(DCStore\Link::class, function (Faker $faker) {
    return [
        'id' => $faker->randomElement(Links::all()->pluck('id')->toArray()),
        'link' => $faker->imageUrl(640, 480),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
        'description' => $faker->sentence(),
        'server' => $faker->randomElement(Server::all()->pluck('id')->toArray()),
    ];
});

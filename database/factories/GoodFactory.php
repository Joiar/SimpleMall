<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'price' => $faker->bankAccountNumber,
        'unit' => $faker->word,
        'store' => $faker->numberBetween(0, 10000),
        'picture' => $faker->text
    ];
});

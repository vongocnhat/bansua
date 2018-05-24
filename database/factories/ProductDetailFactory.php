<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ProductDetail::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'value'=> $faker->numberBetween($min = 1, $max = 100),
        'unit'=> $faker->fileExtension,
    ];
});

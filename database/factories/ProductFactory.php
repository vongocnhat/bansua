<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'img'=> $faker->numberBetween($min = 1, $max = 2) . '.jpg',
        'price'=> $faker->numberBetween($min = 25000, $max = 50000),
        'quantity'=> $faker->numberBetween($min = 1, $max = 10),
        'packet'=> $faker->text,
        'summary'=> $faker->text,
        'description' => $faker->text,
    ];
});

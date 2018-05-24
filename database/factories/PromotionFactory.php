<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Promotion::class, function (Faker $faker) {
    return [
        'price' => $faker->numberBetween($min = 10000, $max = 20000),
        'start' => $faker->dateTimeBetween($startDate = 'now', $endDate = '2018-12-31', $timezone = 'Asia/Ho_Chi_Minh'),
        'end' =>  $faker->dateTimeBetween($startDate = '2018-12-01', $endDate = '2018-12-31', $timezone = 'Asia/Ho_Chi_Minh'),
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Order::class, function (Faker $faker) {
    return [
    	'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->e164PhoneNumber,
        'birthday' => $faker->dateTimeBetween($startDate = '1996-06-18', $endDate = '2000-12-31', $timezone = 'Asia/Ho_Chi_Minh'),
        'gender' => $faker->numberBetween($min = 0, $max = 1),
        'city' => $faker->city,
        'country' => $faker->country,
        'address' => $faker->address,
        'method' => 'offline',
        // 'total_quantity' => $faker->numberBetween($min = 1, $max = 10),
        // 'total_price' => $faker->numberBetween($min = 20000, $max = 50000),
        'status' => $faker->numberBetween($min = 0, $max = 1),
    ];
});

$factory->state(App\Models\Order::class, 'user', function (Faker $faker) {
    return [
        'method' => 'offline',
        // 'total_quantity' => $faker->numberBetween($min = 1, $max = 10),
        // 'total_price' => $faker->numberBetween($min = 20000, $max = 50000),
        'status' => $faker->numberBetween($min = 0, $max = 1),
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Payer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->e164PhoneNumber,
        'birthday' => $faker->dateTimeBetween($startDate = '1996-06-18', $endDate = '2000-12-31', $timezone = 'Asia/Ho_Chi_Minh'),
        'gender' => $faker->numberBetween($min = 0, $max = 1),
        'city' => $faker->city,
        'country' => $faker->country,
        'address' => $faker->address,
    ];
});

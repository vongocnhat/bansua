<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('1'), // secret
        'phone' => $faker->e164PhoneNumber,
        'birthday' => $faker->dateTimeBetween($startDate = '1996-06-18', $endDate = '2000-12-31', $timezone = 'Asia/Ho_Chi_Minh'),
        'gender' => $faker->numberBetween($min = 0, $max = 1),
        'city' => $faker->city,
        'country' => $faker->country,
        'address' => $faker->address,
        'img' => 'default-user.jpg',
        'active' => '1',
        'admin' => 0,
        'remember_token' => str_random(10),
    ];
});

$factory->state(App\Models\User::class, 'admin', function (Faker $faker) {
    return [
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('1'), // secret
        'phone' => '1',
        'birthday' => $faker->dateTimeBetween($startDate = '1996-06-18', $endDate = '2000-12-31', $timezone = 'Asia/Ho_Chi_Minh'),
        'gender' => $faker->numberBetween($min = 0, $max = 1),
        'city' => $faker->city,
        'country' => $faker->country,
        'address' => $faker->address,
        'img' => 'default-user.jpg',
        'active' => 1,
        'admin' => 1,
        'remember_token' => str_random(10),
    ];
});
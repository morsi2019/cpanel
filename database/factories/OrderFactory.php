<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        //'name' => $faker->name,
        //'name' => $faker->realText(15),
        //'user_id' => $faker->name,
        'status' => $faker->boolean,
        'shareable' => $faker->boolean,
        'enterprise' => $faker->realText(55),
        'phone' => $faker->e164PhoneNumber,
        'country' => $faker->realText(15),
        'city' => $faker->realText(20),
        'street' => $faker->realText(25),
    ];
});

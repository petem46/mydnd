<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PC;
use Faker\Generator as Faker;


$factory->define(PC::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'name' => $faker->lastname,
        'race_id' => $faker->numberBetween($min = 1, $max = 10),
        'gender' => $faker->randomElement($array = array ('Male','Female','Other')),
        'class_id' => $faker->numberBetween($min = 1, $max = 10),
        'str' => $faker->numberBetween($min = 8, $max = 14),
        'dex' => $faker->numberBetween($min = 8, $max = 14),
        'con' => $faker->numberBetween($min = 8, $max = 14),
        'int' => $faker->numberBetween($min = 8, $max = 14),
        'wis' => $faker->numberBetween($min = 8, $max = 14),
        'cha' => $faker->numberBetween($min = 8, $max = 14),
        'hp' => $faker->numberBetween($min = 8, $max = 14),
        'ac' => $faker->numberBetween($min = 8, $max = 14),
        'speed' => $faker->numberBetween($min = 5, $max = 8),
        'livehp' => $faker->numberBetween($min = 8, $max = 14),
    ];
});

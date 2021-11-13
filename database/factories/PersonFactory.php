<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Person;
use Faker\Generator as Faker;


$factory->define(Person::class, function (Faker $faker) {
    $gender = $faker->randomElement(['m', 'f']);
    return [
        'number' => $faker->unique()->numberBetween(1, 1000),
        'name' => $faker->name($gender),
        'last_name' => $faker->lastName,
        'gender' => $gender,
        'date_of_birth' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d'),
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(MyControl\Incidencia::class, function (Faker $faker) {
    return [
        'desc' => $faker->address,
        'monto' => $faker->randomNumber,
        'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate  = 'now', $timezone = null),
        'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate  = 'now', $timezone = null),
    ];
});

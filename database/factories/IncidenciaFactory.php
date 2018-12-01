<?php

use Faker\Generator as Faker;

$factory->define(MyControl\Incidencia::class, function (Faker $faker) {
    return [
        'desc' => $faker->address,
        'monto' => $faker->randomNumber,
    ];
});

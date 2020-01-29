<?php

$factory->define(App\Department::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "name_kh" => $faker->name,
        "abr" => $faker->name,
        "beds" => $faker->randomNumber(2),
        "description" => $faker->name,
        "active" => 0,
    ];
});

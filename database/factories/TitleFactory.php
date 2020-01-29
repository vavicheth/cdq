<?php

$factory->define(App\Title::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "title_kh" => $faker->name,
        "abr" => $faker->name,
        "abr_kh" => $faker->name,
        "active" => 1,
    ];
});

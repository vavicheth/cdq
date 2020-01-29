<?php

$factory->define(App\Staff::class, function (Faker\Generator $faker) {
    return [
        "title_id" => factory('App\Title')->create(),
        "name" => $faker->name,
        "name_kh" => $faker->name,
        "gender" => collect(["1","2",])->random(),
        "dob" => $faker->date("d-m-Y", $max = 'now'),
        "staff_code" => $faker->name,
        "phone" => $faker->name,
        "email" => $faker->safeEmail,
        "department_code_id" => factory('App\Department')->create(),
        "active" => 1,
    ];
});

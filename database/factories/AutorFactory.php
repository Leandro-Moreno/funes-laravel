<?php

/** @var Factory $factory */

use App\Autor;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Autor::class, function (Faker $faker) {
    return [
      'nombre' => $faker->firstName,
      'apellido' => $faker->lastName,
      'email' => $faker->unique()->safeEmail
    ];
});

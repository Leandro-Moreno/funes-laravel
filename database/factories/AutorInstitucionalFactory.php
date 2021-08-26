<?php

/** @var Factory $factory */

use App\AutorInstitucional;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(AutorInstitucional::class, function (Faker $faker) {
    return [
      'nombre' => $faker->company
    ];
});

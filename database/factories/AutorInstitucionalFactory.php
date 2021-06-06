<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AutorInstitucional;
use Faker\Generator as Faker;

$factory->define(AutorInstitucional::class, function (Faker $faker) {
    return [
      'nombre' => $faker->company
    ];
});

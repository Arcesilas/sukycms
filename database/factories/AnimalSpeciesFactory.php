<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AnimalSpecies;
use Faker\Generator as Faker;

$factory->define(AnimalSpecies::class, static function (Faker $faker) {
    return [
        'species' => ucfirst($faker->unique()->word()),
    ];
});

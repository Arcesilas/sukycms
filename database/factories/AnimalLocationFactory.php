<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AnimalLocation;
use Faker\Generator as Faker;

$factory->define(AnimalLocation::class, static function (Faker $faker) {
    return [
        'location' => ucfirst($faker->unique()->word()),
    ];
});

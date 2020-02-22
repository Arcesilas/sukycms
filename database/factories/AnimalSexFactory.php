<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AnimalSex;
use Faker\Generator as Faker;

$factory->define(AnimalSex::class, static function (Faker $faker) {
    return [
        'sex' => ucfirst($faker->unique()->word()),
    ];
});

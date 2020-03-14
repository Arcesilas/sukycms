<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AnimalStatus;
use Faker\Generator as Faker;

$factory->define(AnimalStatus::class, static function (Faker $faker) {
    return [
        'status' => ucfirst($faker->unique()->text(30)),
    ];
});

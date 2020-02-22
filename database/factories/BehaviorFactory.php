<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Behavior;
use Faker\Generator as Faker;

$factory->define(Behavior::class, static function (Faker $faker) {
    return [
        'behavior' => ucfirst($faker->unique()->text()),
    ];
});

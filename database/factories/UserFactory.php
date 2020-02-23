<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, static function (Faker $faker) {
    return [
        'name' => $faker->unique()->text(20),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 'secret',
        'remember_token' => Str::random(10),
    ];
});

$factory->state(User::class, 'admin', static function (Faker $faker) {
    return [
        'role' => 'admin',
    ];
});

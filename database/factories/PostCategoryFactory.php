<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(PostCategory::class, static function (Faker $faker) {
    $title = $faker->unique()->sentence();

    return [
        'title' => $title,
        'slug' => Str::slug($title),
    ];
});

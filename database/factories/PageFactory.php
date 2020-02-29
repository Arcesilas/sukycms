<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Page;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Page::class, static function (Faker $faker) {
    $title = $faker->unique()->text(30);

    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'title' => $title,
        'slug' => Str::slug($title),
        'content' => $faker->paragraphs(mt_rand(1, 5), true),
        'published_at' => $faker->dateTimeBetween('-1 year', '+1 year'),
    ];
});

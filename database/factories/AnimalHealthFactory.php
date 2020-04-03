<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enum\Users\HealthType;
use App\Models\Animal;
use App\Models\AnimalHealth;
use Faker\Generator as Faker;

$factory->define(AnimalHealth::class, static function (Faker $faker) {
    return [
        'animal_id' => function () {
            return factory(Animal::class)->create()->id;
        },
        'title' => $faker->sentence,
        'start_date' => $faker->dateTime,
        'end_date' => '',
        'text' => $faker->paragraphs(mt_rand(1, 5), true),
        'type' => $faker->randomElement(HealthType::getValues()),

//        // Vaccine
//        'vaccine' => $faker->word,
//
//        // Treatment
//        'treatments_number' => '',
//        'treatments_each' => '',
//        'treatments_time' => '',
//        'treatments_life' => '',
//
//        // Disease
//        'disease' => '',
//        'medicine' => '',
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Animal;
use App\Models\AnimalSex;
use App\Models\AnimalSpecies;
use App\Models\AnimalLocation;
use Faker\Generator as Faker;

$factory->define(Animal::class, static function (Faker $faker) {
    return [
        'identifier' => $faker->optional(0.2)->bothify('####???####'),
        'name' => ucfirst($faker->unique()->text()),
        'species_id' => AnimalSpecies::inRandomOrder()->first()->id,
//        'location' => AnimalLocation::getRandomValue(),
        'sex_id' => AnimalSex::inRandomOrder()->first()->id,
        'location_id' => AnimalLocation::inRandomOrder()->first()->id,
//        'status' => AnimalStatus::getRandomValue(),
        'birth_date' => $faker->date(),
//        'birth_date_approximate' => $faker->boolean(),
        'entry_date' => $faker->optional()->date(),
//        'urgent' => $faker->boolean(0.2),
//        'special' => $faker->boolean(0.2),
//        'size' => AnimalSize::getRandomValue(),
        'weight' => $faker->optional()->randomFloat(2, 0.05, 100),
        'height' => $faker->optional()->numberBetween(5, 250),
        'length' => $faker->optional()->numberBetween(5, 150),
        'litter' => $faker->optional(0.2)->bothify('###??'),
        'breed' => $faker->optional(0.2)->word(),
        'microchip' => $faker->optional(0.4)->bothify('########################'),
        'description' => $faker->paragraphs(random_int(1, 5), true),
        'private_description' => $faker->optional()->paragraph(random_int(1, 5), true),
        'visits_list' => $faker->randomNumber(),
        'visits' => $faker->randomNumber(),
    ];
});

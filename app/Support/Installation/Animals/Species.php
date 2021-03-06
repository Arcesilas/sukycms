<?php

namespace App\Support\Installation\Animals;

use App\Models\AnimalSpecies;

final class Species
{
    public static function install(): void
    {
        $order = 1;
        foreach (self::data() as $species) {
            AnimalSpecies::forceCreate([
                'species' => $species,
                'order' => $order++,
            ]);
        }
    }

    public static function data(): array
    {
        return __('install.animals.species');
    }
}

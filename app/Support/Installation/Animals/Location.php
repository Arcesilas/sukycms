<?php

namespace App\Support\Installation\Animals;

use App\Models\AnimalLocation;

final class Location
{
    public static function install(): void
    {
        foreach (self::data() as $location) {
            AnimalLocation::forceCreate([
                'location' => $location,
            ]);
        }
    }

    public static function data(): array
    {
        return [
            __('animals.shelter'),
            __('animals.temporary_home'),
            __('animals.street'),
        ];
    }
}
<?php

namespace App\Support\Installation\Animals;

use App\Models\AnimalLocation;

final class Location
{
    public static function install(): void
    {
        $order = 1;
        foreach (self::data() as  $location) {
            AnimalLocation::forceCreate([
                'location' => $location,
                'order' => $order++,
            ]);
        }
    }

    public static function data(): array
    {
        return __('install.animals.locations');
    }
}

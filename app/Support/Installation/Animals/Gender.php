<?php

namespace App\Support\Installation\Animals;

use App\Models\AnimalGender;

final class Gender
{
    public static function install(): void
    {
        foreach (self::data() as $gender) {
            AnimalGender::forceCreate([
                'gender' => $gender,
            ]);
        }
    }

    public static function data(): array
    {
        return [
            __('animals.male'),
            __('animals.female'),
            __('animals.unknown'),
        ];
    }
}

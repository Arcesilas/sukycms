<?php

namespace App\Support\Installation\Animals;

use App\Models\AnimalGender;

final class Gender
{
    public static function install(): bool
    {
        foreach (self::default() as $gender) {
            AnimalGender::forceCreate([
                'gender' => $gender,
            ]);
        }

        return true;
    }

    public static function default(): array
    {
        return [
            __('animals.male'),
            __('animals.female'),
            __('animals.unknown'),
        ];
    }
}

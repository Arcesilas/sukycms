<?php

namespace App\Support\Installation\Animals;

use App\Models\AnimalSex;

final class Sex
{
    public static function install(): void
    {
        $order = 1;
        foreach (self::data() as $sex) {
            AnimalSex::forceCreate([
                'sex' => $sex,
                'order' => $order++,
            ]);
        }
    }

    public static function data(): array
    {
        return __('install.animals.sexes');
    }
}

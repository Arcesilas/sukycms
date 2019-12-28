<?php

namespace App\Support\Installation\Animals;

use App\Models\Behavior;

final class Behaviors
{
    public static function install(): void
    {
        $order = 1;
        foreach (self::data() as $behavior) {
            Behavior::forceCreate([
                'behavior' => $behavior,
                'order' => $order++,
            ]);
        }
    }

    public static function data(): array
    {
        return __('install.animals.behaviors');
    }
}

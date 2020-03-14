<?php

namespace App\Support\Installation\Animals;

use App\Models\Behavior;
use App\Models\AnimalStatus;

final class Statuses
{
    public static function install(): void
    {
        $order = 1;
        foreach (self::data() as $status) {
            AnimalStatus::forceCreate([
                'status' => $status,
                'order' => $order++,
            ]);
        }
    }

    public static function data(): array
    {
        return __('install.animals.statuses');
    }
}

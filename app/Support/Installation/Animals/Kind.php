<?php

namespace App\Support\Installation\Animals;

use App\Models\AnimalKind;

final class Kind
{
    public static function install(): void
    {
        foreach (self::data() as $kind) {
            AnimalKind::forceCreate([
                'kind' => $kind,
            ]);
        }
    }

    public static function data(): array
    {
        return [
            __('animals.kind.dog'),
            __('animals.kind.cat'),
            __('animals.kind.horse'),
            __('animals.kind.rodent'),
            __('animals.kind.bird'),
            __('animals.kind.reptile'),
            __('animals.kind.other'),
        ];
    }
}

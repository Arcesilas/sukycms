<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public static function set(array $options = []): void
    {
        foreach ($options as $key => $value) {
            if ($option = self::query()->where('key', $key)->first()) {
                $option->value = $value;
                $option->save();
            } else {
                self::query()->forceCreate([
                    'key' => $key,
                    'value' => $value,
                ]);
            }
        }
    }
}

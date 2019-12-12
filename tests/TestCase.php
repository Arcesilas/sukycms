<?php

namespace Tests;

use App\Models\Option;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        $this->prepareOptions();
    }

    private function prepareOptions(): void
    {
        collect(config('options'))->each(static function (array $value, string $key) {
            Option::forceCreate([
                'key' => $key,
                'value' => $value['default'] ?? null,
                'autoload' => $value['autoload'] ?? null,
            ]);
        });
    }
}

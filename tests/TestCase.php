<?php

namespace Tests;

use App\Models\Option;
use App\Models\User;
use App\Support\Installation\Install;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        Install::install();
        $this->prepareOptions();
    }

    protected function createAdmin(): User
    {
        return factory(User::class)->state('admin')->create();
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

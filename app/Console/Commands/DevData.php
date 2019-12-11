<?php

namespace App\Console\Commands;

use App\Enum\Users\UserRole;
use App\Enum\Users\UserStatus;
use App\Models\Option;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use RuntimeException;

class DevData extends Command
{
    protected $signature = 'sukycms:devdata';

    public function handle(): void
    {
        $this->canHandle();

        $this->callSilent('migrate:fresh');

        $this->createAdmin();
        $this->createOptions();
    }

    private function createAdmin(): User
    {
        $user = factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'sukycms@gmail.com',
            'password' => 'secret',
            'role' => UserRole::ADMIN,
            'status' => UserStatus::ACTIVE,
        ]);

        $this->info('Admin user:');

        return $user;
    }

    private function canHandle(): void
    {
        if (app()->environment() === 'production') {
            throw new RuntimeException('DevData can not run on production environment');
        }
    }

    private function createOptions(): Collection
    {
        $options = collect(config('options'));

        $optionsInserted = collect([]);

        $options->each(static function (array $value, string $key) use ($optionsInserted) {
            $optionsInserted->push(Option::forceCreate([
                'key' => $key,
                'value' => $value['default'] ?? null,
                'autoload' => $value['autoload'] ?? null,
            ]));
        });

        return $optionsInserted;
    }
}

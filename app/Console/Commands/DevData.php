<?php

namespace App\Console\Commands;

use App\Enum\Users\UserRole;
use App\Enum\Users\UserStatus;
use App\Models\User;
use Illuminate\Console\Command;
use RuntimeException;

class DevData extends Command
{
    protected $signature = 'sukycms:devdata';


    public function handle(): void
    {
        if (app()->environment() === 'production') {
            throw new RuntimeException('DevData can not run on production environment');
        }

        $this->callSilent('migrate:fresh');

        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'sukycms@gmail.com',
            'password' => 'secret',
            'role' => UserRole::ADMIN,
            'status' => UserStatus::ACTIVE,
        ]);

        $this->info('Admin user:');
    }
}

<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DevData extends Command
{
    protected $signature = 'sukycms:devdata';

    public function handle(): void
    {
        factory(User::class)->create([

        ]);

        $this->info('Admin user:');
    }
}

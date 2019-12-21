<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateLastLogin
{
    public function handle($event): bool
    {
        if (! auth()->check()) {
            return false;
        }

        $user = auth()->user();
        $user->last_login = now();
        $user->save();

        return true;
    }
}

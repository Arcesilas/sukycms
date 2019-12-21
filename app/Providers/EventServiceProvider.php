<?php

namespace App\Providers;

use App\Listeners\UpdateLastLogin;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Login::class => [
            UpdateLastLogin::class,
        ],
    ];

    public function boot(): void
    {
        parent::boot();
        //
    }
}

<?php

namespace App\Providers;

use Barryvdh\Debugbar\ServiceProvider as DebugbarServiceProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerDevPackages();
    }

    public function boot(): void
    {
        Paginator::defaultView('admin.components.pagination');
    }

    public function registerDevPackages(): void
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
            //$this->app->register(DebugbarServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }
}

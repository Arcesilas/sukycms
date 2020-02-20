<?php

namespace App\Providers;

use App\Models\Animal;
use App\Models\AnimalLocation;
use App\Models\AnimalSex;
use App\Models\AnimalSpecies;
use App\Models\Behavior;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/';

    public function boot(): void
    {
        Route::model('user', User::class);
        Route::model('animal', Animal::class);
        Route::model('sex', AnimalSex::class);
        Route::model('location', AnimalLocation::class);
        Route::model('species', AnimalSpecies::class);
        Route::model('behavior', Behavior::class);

        Route::macro('orderable', function (string $namespace, string $model, string $controller) {
            Route::get("{$namespace}/{{$model}}/up", [$controller, 'up'])->name("{$namespace}.up");
            Route::get("{$namespace}/{{$model}}/down", [$controller, 'down'])->name("{$namespace}.down");
        });

        parent::boot();
    }

    public function map(): void
    {
        $this->mapAuthRoutes();
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapAdminRoutes();
    }

    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
             ->name('web.')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapAuthRoutes(): void
    {
        Route::middleware('web')
            ->name('auth.')
            ->namespace($this->namespace)
            ->group(base_path('routes/auth.php'));
    }

    protected function mapAdminRoutes(): void
    {
        Route::middleware(['web', 'auth'])
            ->name('admin.')
            ->namespace($this->namespace)
            ->prefix('admin')
            ->group(base_path('routes/admin.php'));
    }

    protected function mapApiRoutes(): void
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}

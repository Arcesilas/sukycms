<?php

namespace App\Providers;

use App\Models\Animal;
use App\Models\AnimalSex;
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
        Route::model('animalsex', AnimalSex::class);

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

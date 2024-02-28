<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class AdminRouteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRoute();
    }

    /**
     * Define the "admin" routes for the application.
     *
     * @return void
     */
    protected function configureRoute()
    {
        Route::middleware('web')
             ->prefix('admin')
             ->namespace($this->namespace)
             ->group(base_path('routes/admin.php'));
    }
}

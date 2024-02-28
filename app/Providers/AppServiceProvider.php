<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Services\LanguageService;
use App\Repositories\LanguageRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(LanguageService::class, function ($app) {
            return new LanguageService($app->make(LanguageRepository::class));
        });

        $this->app->singleton(LanguageRepository::class, function ($app) {
            return new LanguageRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // JetstrapFacade::useAdminLte3();
        Paginator::useBootstrap();
    }
}

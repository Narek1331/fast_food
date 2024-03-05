<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Language;

class GlobalVariablesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        config([
            'app.global_array_variable' => [
                'key1' => 'value1',
                'key2' => 'value2',
                // Add more elements to the array as needed
            ],
        ]);
    }
}

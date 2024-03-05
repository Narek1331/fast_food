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
        $languages = Language::get();
        $langArr = [];
        foreach($languages as $lang){
            $langArr[$lang['name']] = $lang['id'];
        }
        config([
            'app.languages' => $langArr,
            'delivery.price' => 1000
        ]);
    }
}

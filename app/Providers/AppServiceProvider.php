<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(URLGenerator $url)
    {
        Schema::defaultStringLength(191);

        if (config('app.env') !== 'local' && config('app.https')) {
            $url->forceScheme('https');
        }
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $forceHttps = false;

        if ($this->app->environment('production')) {
            $forceHttps = true;
        }

        if (env('APP_URL') && strpos(env('APP_URL'), 'https://') === 0) {
            $forceHttps = true;
        }

        if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https') {
            $forceHttps = true;
        }

        if ($forceHttps) {
            URL::forceScheme('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

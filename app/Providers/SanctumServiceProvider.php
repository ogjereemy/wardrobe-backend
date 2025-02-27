<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class SanctumServiceProvider extends ServiceProvider
{
    public function register()
    {
        // ...existing code...
    }

    public function boot()
    {
        // ...existing code...

        // Comment out any custom logic that extends the Auth facade
        // Auth::extend('custom', function ($app, $name, array $config) {
        //     // Custom logic here
        // });
    }
}

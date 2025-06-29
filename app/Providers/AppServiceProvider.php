<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Adicione este código
        if (isset($_SERVER['LAMBDA_TASK_ROOT'])) {
            config(['view.compiled' => '/tmp/views']);
        }
    }
}

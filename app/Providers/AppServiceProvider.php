<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Pagination\Paginator;
use App\Http\Middleware\CheckTokenExpiry;

class AppServiceProvider extends ServiceProvider
{
    public function configureMiddleware(Middleware $middleware): void
    {
        $middleware->append(CheckTokenExpiry::class); // Global web middleware
    }

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
        Paginator::useBootstrapFive();
    }
}

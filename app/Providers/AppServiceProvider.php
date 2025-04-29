<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Laravel\Fortify\Contracts\LoginResponse;
use App\Http\Controllers\Auth\LoginResponseController;

use Laravel\Fortify\Contracts\RegisterResponse;
use App\Http\Controllers\Auth\RegisterResponseController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(LoginResponse::class, LoginResponseController::class);
        $this->app->singleton(RegisterResponse::class, RegisterResponseController::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

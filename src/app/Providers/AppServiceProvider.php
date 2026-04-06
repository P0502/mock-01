<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Laravel\Fortify\Contracts\RegisterResponse; 
use App\Actions\Fortify\RegisterResponse as CustomRegisterResponse;

use Laravel\Fortify\Contracts\LoginResponse; 
use App\Actions\Fortify\LoginResponse as CustomLoginResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RegisterResponse::class, CustomRegisterResponse::class); 
        $this->app->singleton(LoginResponse::class, CustomLoginResponse::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

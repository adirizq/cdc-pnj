<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('superadmin', function () {
            $user = Auth::user();

            return auth()->user() && $user->role == 0;
        });

        Blade::if('admin', function () {
            $user = Auth::user();

            return auth()->user() && ($user->role == 0 || $user->role == 1);
        });

        Blade::if('company', function () {
            $user = Auth::user();

            return auth()->user() && $user->role == 2;
        });

        Blade::if('mahasiswa', function () {
            $user = Auth::user();

            return auth()->user() && $user->role == 3;
        });
    }
}

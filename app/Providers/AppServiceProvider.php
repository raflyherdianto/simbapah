<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('admin', function(User $user){
            return $user->level == 'Admin';
        });

        Gate::define('petugas', function(User $user){
            return $user->level == 'Petugas';
        });

        Gate::define('pelanggan', function(User $user){
            return $user->level == 'Pelanggan';
        });

        Gate::define('mitra', function(User $user){
            return $user->level == 'Mitra';
        });
    }
}

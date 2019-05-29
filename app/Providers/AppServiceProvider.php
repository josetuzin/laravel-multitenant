<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Schema::defaultStringLength(191);


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Schema::defaultStringLength(191);

        /**
         * Directivas
         */
        Blade::if('tenant', function () {
            return request()->getHost() != config('tenant.domain_main');
        });

        Blade::if('tenantmain', function () {
            return request()->getHost() == config('tenant.domain_main');
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
        // Don't kill the app if the database hasn't been created.
        try {
            DB::connection('sqlite')->statement(
                'PRAGMA synchronous = OFF;'
            );
        } catch (\Throwable $throwable) {
            return;
        }

        Schema::defaultStringLength(191);
    }
}

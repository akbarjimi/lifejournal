<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MovieDatabaseAdapter;
use App\Services\OMDB;

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
        $this->app->bind(MovieDatabaseAdapter::class, OMDB::class);
    }
}

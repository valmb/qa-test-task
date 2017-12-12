<?php

namespace App\Providers;

use App\Services\Apples\ApplesRepo;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('apples.repo', function () {
            return new ApplesRepo();
        });
    }
}

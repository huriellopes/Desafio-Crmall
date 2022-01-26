<?php

namespace App\Architeture\Comics\Providers;

use App\Architeture\Comics\Interfaces\IWebService;
use App\Architeture\Comics\Services\Webservice;
use Illuminate\Support\ServiceProvider;

class ComicsAppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            IWebService::class,
            Webservice::class
        );
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

<?php

namespace App\Architeture\Checkouts\Providers;

use App\Architeture\Checkouts\Interfaces\ICheckoutRepository;
use App\Architeture\Checkouts\Interfaces\ICheckoutService;
use App\Architeture\Checkouts\Repositories\CheckoutRepository;
use App\Architeture\Checkouts\Services\CheckoutService;
use Illuminate\Support\ServiceProvider;

class CheckoutAppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            ICheckoutService::class,
            CheckoutService::class
        );

        $this->app->singleton(
            ICheckoutRepository::class,
            CheckoutRepository::class
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

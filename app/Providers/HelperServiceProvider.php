<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /* NEW BINDING */

        $this->app->singleton(
            \App\Helpers\SeoHelperInterface::class,
            \App\Helpers\Production\SeoHelper::class
        );

        $this->app->singleton(
            \App\Helpers\IsMobileHelperInterface::class,
            \App\Helpers\Production\IsMobileHelper::class
        );
    }
}

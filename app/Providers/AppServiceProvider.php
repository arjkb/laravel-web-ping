<?php

namespace App\Providers;

use App\Observers\SiteObserver;
use App\Site;
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
        Site::observe(SiteObserver::class);
    }
}

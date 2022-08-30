<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        
        view()->composer('*', function ($view)
        {

            $services = \App\Models\Service::where('status','show')->get();
            $portfolios = \App\Models\Portfolio::where('status','show')->get();

            $view->with(compact('services','portfolios'));
        
        });
    }
}

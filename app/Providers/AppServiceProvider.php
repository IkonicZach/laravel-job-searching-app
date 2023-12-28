<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        View::composer(['admin.tabs.companies', 'employer.company.create', 'employer.company.edit'], function ($view) {
            $view->with('countries', ['United States', 'Japan', 'Myanmar', 'South Korea', 'United Kingdom']);
            $view->with('cities', ['Florida', 'Osaka', 'Yangon', 'Seoul', 'Birmingham']);
        });
    }
}

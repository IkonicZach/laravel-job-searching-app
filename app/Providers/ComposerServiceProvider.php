<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['layout.nav', 'layout.navpanel'], function ($view) {
            if (auth()->check()) {
                $user = auth()->user();
                $bookmarkedJobs = $user->bookmarkedJobs;
                $count = count($bookmarkedJobs);
            } else {
                $count = 0;
            }

            $view->with('count', $count);
        });

    }
}

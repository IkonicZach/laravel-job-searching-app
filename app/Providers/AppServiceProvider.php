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

        View::composer(['admin.tabs.companies', 'employer.company.create', 'employer.company.edit', 'candidate.resume.create', 'job.index'], function ($view) {
            $view->with('countries', ['United States', 'Japan', 'Myanmar', 'South Korea', 'United Kingdom']);
            $view->with('cities', ['Florida', 'Osaka', 'Yangon', 'Seoul', 'Birmingham']);
            $view->with('fields', ['Artificial Intelligence', 'Bioinformatics', 'Computer Engineering', 'Computer Graphics', 'Computer Science', 'Computer Networks', 'Cybersecurity', 'Data Science', 'Database Management', 'Digital Media', 'Game Development', 'Geographic Information Systems (GIS)', 'Health Informatics', 'Information Systems', 'Information Technology', 'Machine Learning', 'Mobile Computing', 'Network Administration', 'Robotics', 'Software Engineering', 'Systems Analysis', 'Web Development']);
            $view->with('languages', ['Burmese', 'Chinese', 'English', 'Japanese', 'Korean']);
        });
    }
}

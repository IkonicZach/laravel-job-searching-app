<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Blogcategory;
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

        View::composer(['admin.tabs.companies', 'employer.company.create', 'employer.company.edit', 'employer.company.listing', 'job.index', 'job.edit', 'admin.tabs.jobs'], function ($view) {
            $view->with('countries', ['United States', 'Japan', 'Myanmar', 'South Korea', 'United Kingdom']);
            $view->with('cities', ['Florida', 'Osaka', 'Yangon', 'Seoul', 'Birmingham']);
            $view->with('fields', ['Artificial Intelligence', 'Bioinformatics', 'Computer Engineering', 'Computer Graphics', 'Computer Science', 'Computer Networks', 'Cybersecurity', 'Data Science', 'Database Management', 'Digital Media', 'Game Development', 'Geographic Information Systems (GIS)', 'Health Informatics', 'Information Systems', 'Information Technology', 'Machine Learning', 'Mobile Computing', 'Network Administration', 'Robotics', 'Software Engineering', 'Systems Analysis', 'Web Development']);
            $view->with('languages', ['Burmese', 'Chinese', 'English', 'Japanese', 'Korean']);
            $view->with('employment_types', ['Full-time', 'Part-time', 'Freelance', 'Remote', 'Hourly-basics', 'Fixed-price']);
        });

        View::composer(['candidate.resume.create', 'candidate.resume.edit'], function ($view) {
            $view->with('fields', ['Artificial Intelligence', 'Bioinformatics', 'Computer Engineering', 'Computer Graphics', 'Computer Science', 'Computer Networks', 'Cybersecurity', 'Data Science', 'Database Management', 'Digital Media', 'Game Development', 'Geographic Information Systems (GIS)', 'Health Informatics', 'Information Systems', 'Information Technology', 'Machine Learning', 'Mobile Computing', 'Network Administration', 'Robotics', 'Software Engineering', 'Systems Analysis', 'Web Development']);
            $view->with('languages', ['Burmese', 'Chinese', 'English', 'Japanese', 'Korean']);
            $view->with('employment_types', ['Full-time', 'Part-time', 'Freelance', 'Remote', 'Hourly-basics', 'Fixed-price']);
        });

        view()->composer('blog.sidebar', function ($view) {
            $categories = Blogcategory::select('id', 'name')->limit(10)->get();
            $view->with('categories', $categories);
        });

        // Share latest posts with the 'blog.sidebar' view
        view()->composer('blog.sidebar', function ($view) {
            $latestBlogs = Blog::latest()->limit(3)->get();
            $view->with('latestBlogs', $latestBlogs);
        });

    }
}

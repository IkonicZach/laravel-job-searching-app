<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;

class PageController extends Controller
{
    public function checkpoint()
    {
        return view('auth.register_checkpoint');
    }
    public function contact()
    {
        return view('contact.index');
    }

    public function job()
    {
        return view('job.index');
    }

    public function admin()
    {
        return view('admin.index');
    }
    
    public function categories()
    {
    }

    public function companies()
    {
        $countries = ['United States', 'Japan', 'Myanmar', 'South Korea', 'United Kingdom'];
        $cities = ['Florida', 'Osaka', 'Yangon', 'Seoul', 'Birmingham'];
        $categories = Category::select('id', 'name')->get();
        $companies = Company::with('category')->get();
        return view('admin.tabs.companies', compact('companies', 'countries', 'cities', 'categories'));
    }

    public function error404()
    {
        return view('special.404');
    }
}

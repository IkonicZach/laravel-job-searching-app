<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $companies = Company::all();
        $jobs = Job::all();
        return view('admin.tabs.dashboard', compact('users', 'companies', 'jobs'));
    }
}

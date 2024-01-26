<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Spatie\Permission\Models\Permission;

class TrashPageController extends Controller
{

    public function category()
    {
        $categories = Category::onlyTrashed()->get();
        return view('admin.trash.categories', compact('categories'));
    }

    public function permission()
    {
        $permissions = Permission::onlyTrashed()->get();
        return view('admin.trash.permissions', compact('permissions'));
    }

    public function job()
    {
        $trashes = Job::onlyTrashed()->get();
        return view('job.trash', compact('trashes'));
    }
}

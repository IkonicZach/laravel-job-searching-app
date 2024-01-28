<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Experiences;
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

    public function application()
    {
        $trashes = Application::onlyTrashed()->get();
        return view('candidate.application-trash', compact('trashes'));
    }

    public function experience($id)
    {
        $trashes = Experiences::onlyTrashed()
            ->where('user_id', $id)
            ->get();

        return view('candidate.experience-trash', compact('trashes'));
    }
}

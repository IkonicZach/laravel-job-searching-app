<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobUpdateRequest;
use App\Models\Category;
use App\Models\Job;
use App\Models\Subcategory;
use Exception;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $jobs = Job::paginate(5);
            $categories = Category::all();
            $subcategories = Subcategory::all();
            return view('admin.tabs.jobs', compact('jobs', 'categories', 'subcategories'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobUpdateRequest $request, string $id)
    {
        try {
            $job = Job::findOrFail($id);

            $job->update([
                'company_id' => $request->input('company_id'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'responsibilities' => $request->input('responsibilities'),
                'benefits' => $request->input('benefits'),
                'requirements' => $request->input('requirements'),
                'category_id' => $request->input('category_id'),
                'subcategory_id' => $request->input('subcategory_id'),
                'min_salary' => $request->input('min_salary'),
                'max_salary' => $request->input('max_salary'),
                'employment_type' => $request->input('employment_type'),
                'type' => $request->input('type'),
                'deadline' => $request->input('deadline'),
                'limit' => $request->input('limit') ?? null,
                'status' => $request->input('status'),
                'address' => $request->input('address'),
                'country' => $request->input('country'),
                'city' => $request->input('city'),
                'updated_by' => $request->input('updated_by'),
            ]);

            $message = "Updated Successfully!";
            $messageBody = "Job details updated successfully.";
            return redirect()->route('job.show', $job->id)->with(compact('message', 'messageBody'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

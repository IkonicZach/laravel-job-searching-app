<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Category;
use App\Models\Job;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employment_types = [
            'Full-time',
            'Part-time',
            'Freelance',
            'Remote',
            'Hourly-basics',
            'Fixed-price',
        ];

        $countries = [
            'name' => ['United States', 'Japan', 'Myanmar', 'South Korea', 'United Kingdom'],
        ];

        $cities = [
            'name' => ['Florida', 'Osaka', 'Yangon', 'Seoul', 'Birmingham'],
        ];

        // Query to get the counts of each employment type
        $employmentTypeCounts = DB::table('jobs')
            ->select('employment_type', DB::raw('count(*) as count'))
            ->whereIn('employment_type', $employment_types)
            ->groupBy('employment_type')
            ->get();

        // Create an associative array with all employment types and their counts
        $allEmploymentTypeCounts = [];
        foreach ($employment_types as $type) {
            $count = $employmentTypeCounts->firstWhere('employment_type', $type);
            $allEmploymentTypeCounts[$type] = $count ? $count->count : 0;
        }

        $categories = Category::select('id', 'name')->get();
        $jobs = Job::paginate(10);
        return view('job.index', compact('jobs', 'categories', 'employment_types', 'allEmploymentTypeCounts', 'countries', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $employment_types = [
            'name' => ['Full-time', 'Part-time', 'Freelance', 'Remote', 'Hourly-basics', 'Fixed-price'],
        ];

        $countries = [
            'name' => ['United States', 'Japan', 'Myanmar', 'South Korea', 'United Kingdom'],
        ];

        $cities = [
            'name' => ['Florida', 'Osaka', 'Yangon', 'Seoul', 'Birmingham'],
        ];

        $categories = Category::all();
        return view('job.create', compact('categories', 'employment_types', 'countries', 'cities'));
    }

    public function getSubcategories(Request $request)
    {
        $categoryId = $request->input('category_id');
        $subcategories = Subcategory::where('category_id', $categoryId)->get();

        return response()->json($subcategories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        Job::create([
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
            'status' => $request->input('status'),
            'address' => $request->input('address'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'created_by' => $request->input('created_by'),
        ]);

        // return $request->all();
        return redirect('/jobs/listing');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::with(['subcategory', 'category', 'company'])->findOrFail($id);
        return view('job.details', compact('job'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function apply(string $id)
    {
        $job = Job::find($id);
        return view('job.apply', compact('job'));
    }
}
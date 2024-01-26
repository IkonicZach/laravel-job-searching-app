<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobApplyRequest;
use App\Http\Requests\JobRequest;
use App\Http\Requests\JobUpdateRequest;
use App\Models\Application;
use App\Models\Category;
use App\Models\Job;
use App\Models\Subcategory;
use App\Models\User;
use App\Notifications\JobApplicationNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

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
            'Hourly-basics',
            'Fixed-price',
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

        $user = auth()->user();
        $categories = Category::select('id', 'name')->get();
        $jobs = Job::with('applications')->paginate(10);

        return view('job.index', compact('jobs', 'categories', 'employment_types', 'allEmploymentTypeCounts', 'user'));
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
            'limit' => $request->input('limit') ?? null,
            'status' => $request->input('status'),
            'address' => $request->input('address'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'created_by' => $request->input('created_by'),
        ]);

        // return $request->all();
        return redirect()->route('job.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $job = Job::with(['subcategory', 'category', 'company'])->findOrFail($id);
        $similarJobs = Job::where('id', '!=', $job->id)
            ->where(function ($query) use ($job) {
                $query->where('company_id', $job->company_id)
                    ->orWhere('category_id', $job->category_id)
                    ->orWhere('subcategory_id', $job->subcategory_id)
                    ->orWhere('min_salary', $job->min_salary)
                    ->orWhere('max_salary', $job->max_salary)
                    ->orWhere('employment_type', $job->employment_type)
                    ->orWhere('type', $job->type)
                    ->orWhere('country', $job->country)
                    ->orWhere('city', $job->city);
            })
            ->take(3)
            ->get();

        return view('job.details', compact('job', 'user', 'similarJobs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::with('subcategory')->findOrFail($id);
        $categories = Category::select('id', 'name')->get();
        $subcategories = Subcategory::select('id', 'name')->get();
        return view('job.edit', compact('job', 'categories', 'subcategories'));
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
        $job = Job::findOrFail($id);
        $job->delete();

        $message = "Moved to trash";
        $messageBody = "The job has been moved to trash successfully!";

        return redirect()->route('company.profile', $job->created_by)->with(compact('message', 'messageBody'));
    }

    public function restore(string $id)
    {
        try {
            $job = Job::withTrashed()->findOrFail($id);
            $job->restore();

            $message = "Restored successfully!";
            $messageBody = "'$job->name' resume has been restored successfully!";

            return redirect()->route('job.trash')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(string $id)
    {
        try {
            $job = Job::withTrashed()->findOrFail($id);
            $job->forceDelete();

            $message = "Permanently deleted successfully!";
            $messageBody = "Job'$job->id' has been permanently deleted!";

            return redirect()->route('job.trash')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function apply(JobApplyRequest $request, string $id)
    {
        try {
            $user_id = $request->input('user_id');
            $job = Job::with('applications')->findOrFail($id);

            if ($job->limit != null) {
                if (count($job->applications) >= $job->limit) {
                    $message = "Application Failed!";
                    $messageBody = "Application is full. You cannot apply anymore.";
                    return back()->with(compact('message', 'messageBody'));
                }
            }

            $count = Application::where('user_id', $user_id)
                ->where('job_id', $id)
                ->count();

            if ($count > 0) { // Checking whether user has already applied or not
                $message = "Application failed!";
                $messageBody = "You have already applied to this job.";
                return redirect()->route('job.show', $id)->with(compact('message', 'messageBody'));
            } else {
                $resumeName = time() . '.' . $request->resume_path->extension();
                $request->resume_path->move(public_path('downloads/resume'), $resumeName); // Storing resume

                $application = Application::create([
                    'user_id' => $user_id,
                    'job_id' => $job->id,
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'resume_path' => $resumeName,
                ]);

                $application->notify(new JobApplicationNotification($application));

                $count = Application::where('job_id', $job->id)->count();
                if ($count >= $job->limit) {
                    $job->status = "unavailable";
                    $job->save();
                }

                $message = "Applied successfully!";
                $messageBody = "You have successfully applied the job.";
                return redirect()->route('job.show', $id)->with(compact('message', 'messageBody'));
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function search(Request $request)
    {
        $employment_types = [
            'Full-time',
            'Part-time',
            'Freelance',
            'Hourly-basics',
            'Fixed-price',
        ];

        $employmentTypeCounts = DB::table('jobs')
            ->select('employment_type', DB::raw('count(*) as count'))
            ->whereIn('employment_type', $employment_types)
            ->groupBy('employment_type')
            ->get();

        $allEmploymentTypeCounts = [];

        foreach ($employment_types as $type) {
            $count = $employmentTypeCounts->firstWhere('employment_type', $type);
            $allEmploymentTypeCounts[$type] = $count ? $count->count : 0;
        }

        $categories = Category::select('id', 'name')->get();

        $query = Job::query();
        $query->join('companies', 'jobs.company_id', '=', 'companies.id');

        $query->select([
            'jobs.id as id',
            'jobs.title',
            'jobs.category_id',
            'jobs.subcategory_id',
            'jobs.country',
            'jobs.city',
            'jobs.employment_type',
            'jobs.created_at as created_at',
            'companies.id as company_id',
            'companies.name',
            'jobs.min_salary',
            'jobs.max_salary',
        ]);

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('jobs.title', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('companies.name', 'like', '%' . $request->input('search') . '%');
            });
        }

        if ($request->filled('category')) {
            $query->where('jobs.category_id', $request->input('category'));
        }

        if ($request->filled('subcategory')) {
            $query->where('jobs.subcategory_id', $request->input('subcategory'));
        }

        if ($request->filled('country')) {
            $query->where('jobs.country', $request->input('country'));
        }

        if ($request->filled('city')) {
            $query->where('jobs.city', $request->input('city'));
        }

        if ($request->filled('employment_type')) {
            $query->where('jobs.employment_type', $request->input('employment_type'));
        }

        $jobs = $query->paginate(10);
        $user = auth()->user();
        return view('job.index', compact('jobs', 'categories', 'employment_types', 'allEmploymentTypeCounts', 'user'));
        // return $request->all();
    }

    public function applications($id)
    {
        $applications = Application::with('user')->where('job_id', $id)->get();
        return view('job.applications', compact('applications'));
    }

    public function download($id)
    {
        $application = Application::findOrFail($id);

        $file = public_path('downloads/resume/' . $application->resume_path);

        return Response::download($file, 'resume.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }
}

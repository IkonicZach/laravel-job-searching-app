<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Company::query();
        $query->select(
            'companies.id as id',
            'companies.name',
            'companies.category_id',
            'companies.bio',
            'companies.img',
            'companies.country',
            'companies.city',
            'companies.address',
        );

        if ($request->filled('input')) {
            $query->where(function ($q) use ($request) {
                $q->where('companies.name', 'like', '%' . $request->input('input') . '%')
                    ->orWhere('companies.country', 'like', '%' . $request->input('input') . '%')
                    ->orWhere('companies.city', 'like', '%' . $request->input('input') . '%')
                    ->orWhere('companies.address', 'like', '%' . $request->input('input') . '%');
            });
        }

        if ($request->filled('country')) {
            $query->where('companies.country', $request->input('country'));
        }

        if ($request->filled('category_id')) {
            $query->where('companies.category_id', $request->input('category_id'));
        }

        $categories = Category::select('id', 'name')->get();
        $companies = $query->with('employer', 'jobs')->paginate(12);
        return view('employer.company.listing', compact('companies', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('employer.company.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyCreateRequest $request)
    {
        try {
            if ($request->hasFile('img')) {
                $imageName = 'com' . time() . '.' . $request->img->extension();
                $request->img->move(public_path('uploads'), $imageName);
            }
            $company = Company::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'img' => $imageName ?? null,
                'bio' => $request->input('bio'),
                'category_id' => $request->input('category_id'),
                'size' => $request->input('size'),
                'founder' => $request->input('founder'),
                'founded' => $request->input('founded'),
                'country' => $request->input('country'),
                'city' => $request->input('city'),
                'address' => $request->input('address'),
                'socials' => $request->input('socials'),
                'created_by' => $request->input('created_by'),
            ]);

            $user = auth()->user(); // Getting current user
            $user->company_id = $company->id; // Update the user's company_id
            $user->position = $request->input('position');
            $user->save();
            return redirect('/');

        } catch (Exception $e) {
            return $e->getMessage();
        }
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
        try {
            $company = Company::with('createdBy')->findOrFail($id);
            if ($company->created_by != auth()->user()->id) {
                abort(403);
            }

            $categories = Category::select('id', 'name')->get();
            return view('employer.company.edit', compact('company', 'categories'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyUpdateRequest $request, string $id)
    {
        try {
            $company = Company::findOrFail($id);

            if ($request->hasFile('img')) {
                // Delete old photo from storage
                $imgPath = public_path('uploads/') . $company->img;
                if (File::exists($imgPath)) {
                    File::delete($imgPath);
                }

                // Update new photo
                $imgName = 'com' . time() . '.' . $request->img->extension();
                $request->img->move(public_path('uploads'), $imgName);
                $company->img = $imgName;
            }

            $company->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'bio' => $request->input('bio'),
                'category_id' => $request->input('category_id'),
                'size' => $request->input('size'),
                'founder' => $request->input('founder'),
                'founded' => $request->input('founded'),
                'country' => $request->input('country'),
                'city' => $request->input('city'),
                'address' => $request->input('address'),
                'socials' => $request->input('socials'),
                'updated_by' => $request->input('updated_by'),
            ]);
            $user = User::with('company')->findOrFail($request->input('updated_by'));

            $message = "Updated Successfully!";
            $messageBody = "Company details updated successfully.";

            return redirect()->route('company.profile', $user->id)->with(compact('message', 'messageBody'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // $company = Company::find($id);
            // $company->delete();
            // $message = "Deleted successfully!";
            // $messageBody = "'$company->name' company has been deleted successfully!";

            // return redirect()->route('admin.company.index')->with('message', $message)->with('messageBody', $messageBody);
            return "This is employer";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function profile(String $id)
    {
        $company = Company::findOrFail($id);

        $jobs = Job::where('company_id', '=', $company->id)->orderBy('created_at', 'desc')->get();
        $showJobs = Job::with('applications')->where('company_id', '=', $company->id)->orderBy('created_at', 'desc')->take(2)->get();

        $similarCompanies = Company::where('id', '!=', $company->id)
            ->where(function ($query) use ($company) {
                $query->where('category_id', $company->category_id)
                    ->orWhere('size', $company->size)
                    ->orWhere('country', $company->country)
                    ->orWhere('city', $company->city);
            })
            ->take(4)
            ->get();

        return view('employer.company.profile', compact('company', 'jobs', 'showJobs', 'similarCompanies'));
    }
}

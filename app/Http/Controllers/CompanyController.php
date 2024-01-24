<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Exception;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::select('id', 'name')->get();
        $companies = Company::with('employer', 'jobs')->get();
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
                $imageName = time() . '.' . $request->img->extension();
                $request->img->move(public_path('uploads'), $imageName);
            }
            $company = Company::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'img' => $imageName ?? null,
                'bio' => $request->input('bio'),
                'category_id' => $request->input('category_id'),
                'size' => $request->input('size'),
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
                $imageName = time() . '.' . $request->img->extension();
                $request->img->move(public_path('uploads'), $imageName);
                $company->img = $imageName;
            }

            $company->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'bio' => $request->input('bio'),
                'category_id' => $request->input('category_id'),
                'size' => $request->input('size'),
                'country' => $request->input('country'),
                'city' => $request->input('city'),
                'address' => $request->input('address'),
                'socials' => $request->input('socials'),
                'updated_by' => $request->input('updated_by'),
            ]);
            $user = User::with('company')->findOrFail($request->input('updated_by'));
            // if ($user->company_id == null) {
            //     return redirect()->route('company.profile', $user->id);
            // } else {
            //     return redirect()->route('company.profile', $user->id);
            // }

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
        $user = User::with('company')->findOrFail($id);

        $jobs = Job::where('created_by', '=', $user->id)->orderBy('created_at', 'desc')->get();
        $showJobs = Job::where('created_by', '=', $user->id)->orderBy('created_at', 'desc')->take(2)->get();

        $company = $user->company;
        $similarCompanies = Company::where('id', '!=', $company->id)
            ->where(function ($query) use ($company) {
                $query->where('category_id', $company->category_id)
                    ->orWhere('size', $company->size)
                    ->orWhere('country', $company->country)
                    ->orWhere('city', $company->city);
            })
            ->take(4)
            ->get();

        return view('employer.company.profile', compact('user', 'jobs', 'showJobs', 'similarCompanies'));
    }
}

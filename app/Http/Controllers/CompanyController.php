<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use Exception;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = ['United States', 'Japan', 'Myanmar', 'South Korea', 'United Kingdom'];
        $cities = ['Florida', 'Osaka', 'Yangon', 'Seoul', 'Birmingham'];
        $categories = Category::select('id', 'name')->get();
        return view('employer.company.create', compact('categories', 'countries', 'cities'));
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
            $countries = ['United States', 'Japan', 'Myanmar', 'South Korea', 'United Kingdom'];
            $cities = ['Florida', 'Osaka', 'Yangon', 'Seoul', 'Birmingham'];
            $categories = Category::select('id', 'name')->get();
            $company = Company::with('createdBy')->findOrFail($id);
            return view('employer.company.edit', compact('company', 'countries', 'cities', 'categories'));
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
            // return $request->all();
            $user = User::with('company')->findOrFail($id);
            if ($user->company_id == null) {
                return redirect()->route('admin.companies');
            } else {
                return redirect()->route('company.profile', $user->id);
            }
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

    public function profile(String $id)
    {
        $user = User::with('company')->findOrFail($id);
        return view('employer.company.profile', compact('user'));
    }
}

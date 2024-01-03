<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use Exception;

class AdminCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        $categories = Category::select('id','name')->get();
        return view('admin.tabs.companies', compact('companies', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyCreateRequest $request)
    {
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
                return redirect()->route('company.index');
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
        try {
            $company = Company::find($id);
            $company->delete();
            $message = "Deleted successfully!";
            $messageBody = "'$company->name' company has been deleted successfully!";

            return redirect()->route('admin.company.index')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function restore(string $id)
    {
        try {
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function profile(String $id)
    {
        $user = User::with('company')->findOrFail($id);
        return view('employer.company.profile', compact('user'));
    }
}

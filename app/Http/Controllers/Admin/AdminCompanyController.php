<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\File;

class AdminCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        $categories = Category::select('id', 'name')->get();
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

            return redirect()->route('company-management.index')->with(compact('message', 'messageBody'));
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

            return redirect()->route('admin.tabs.companies')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function restore(string $id)
    {
        try {
            $company = Company::withTrashed()->findOrFail($id);
            $company->restore();

            $message = "Restored successfully!";
            $messageBody = "Company has been restored successfully!";

            return redirect()->route('company-management.index')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(string $id)
    {
        try {
            $company = Company::withTrashed()->findOrFail($id);
            $company->forceDelete();

            $message = "Permanently deleted successfully!";
            $messageBody = "Company has been permanently deleted!";

            return redirect()->route('company-management.index')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

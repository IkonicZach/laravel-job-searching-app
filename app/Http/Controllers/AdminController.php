<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use Exception;

class AdminController extends Controller
{
    public function companyIndex()
    {
        $categories = Category::select('id', 'name')->get();
        $companies = Company::all();
        return view('admin.tabs.companies', compact('companies', 'categories'));
    }

    public function companyDestroy(string $id)
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

    public function companyUpdate(CompanyUpdateRequest $request, string $id)
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
                return redirect()->route('admin.company.index');
            } else {
                return redirect()->route('company.profile', $user->id);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

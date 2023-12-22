<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        try {
            $cat = Category::whereId($id)->firstOrFail();
            Subcategory::create([
                'name' => $request->get('name'),
                'category_id' => $id,
                'created_by' => $request->input('created_by'),
            ]);

            $message = "Sub-category created successfully!";
            $messageBody = "Category $cat->name's new sub-category '$request->name' has been created successfully";
            return redirect()->route('category.index')->with('message', $message)->with('messageBody', $messageBody);
        } catch (\Exception $e) {
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $subcat = Subcategory::whereId($id)->firstOrFail();
            $oldname = $subcat->name;

            $subcategory = Subcategory::find($id);

            $subcategory->update([
                'name' => $request->get('name'),
                'category_id' => $request->input('category'),
                'updated_by' => $request->input('updated_by'),
            ]);

            $message = "Sub-category updated successfully";
            $messageBody = "Sub-category name '$oldname' has been updated to '$subcategory->name' and category has been updated to $request->category.";

            return back()->with('message', $message)->with('messageBody', $messageBody);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Subcategory::find($id);
            $category->delete();
            $message = "Deleted successfully!";
            $messageBody = "'$category->name' sub-category has been deleted successfully!";

            return redirect('/admin')->with('message', $message)->with('messageBody', $messageBody);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }
}

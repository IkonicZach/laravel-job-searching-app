<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        $subcategories = Subcategory::paginate(5);
        return view('admin.tabs.categories', compact('categories', 'subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            Category::create([
                'name' => $request->get('name'),
                'created_by' => $request->input('created_by'),
            ]);

            $message = "Category created successfully";
            $messageBody = "New category '$request->name' has been created successfully!";

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
    public function update(CategoryUpdateRequest $request, string $id)
    {
        try {
            $category = Category::findOrFail($id);

            $category->update([
                'name' => $request->get('name'),
                'updated_by' => $request->input('updated_by'),
            ]);

            $message = "Category updated successfully";
            $messageBody = "Category name has been updated to '$category->name'";

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
            $category = Category::find($id);
            $category->delete();
            $message = "Deleted successfully!";
            $messageBody = "'$category->name' category has been deleted successfully!";

            return redirect()->route('category.index')->with('message', $message)->with('messageBody', $messageBody);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

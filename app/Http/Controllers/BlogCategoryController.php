<?php

namespace App\Http\Controllers;

use App\Models\Blogcategory;
use Exception;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Blogcategory::paginate(5);
        return view('admin.tabs.blogcategory', compact('categories'));
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
    public function store(Request $request)
    {
        try {
            Blogcategory::create([
                'name' => $request->get('name'),
                'created_by' => $request->input('created_by'),
            ]);

            $message = "Category created successfully";
            $messageBody = "New category '$request->name' has been created successfully!";

            return redirect()->route('blogcategory.index')->with('message', $message)->with('messageBody', $messageBody);

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $category = Blogcategory::findOrFail($id);

            $category->update([
                'name' => $request->get('name'),
                'updated_by' => $request->input('updated_by'),
            ]);

            $message = "Category updated successfully";
            $messageBody = "Category name has been updated to '$category->name'";

            return back()->with('message', $message)->with('messageBody', $messageBody);

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
            $category = Blogcategory::find($id);
            $category->delete();

            $message = "Deleted successfully!";
            $messageBody = "'$category->name' category has been deleted successfully!";

            return redirect()->route('blogcategory.index')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function restore(string $id)
    {
        try {
            $category = Blogcategory::withTrashed()->findOrFail($id);
            $category->restore();

            $message = "Restored successfully!";
            $messageBody = "'$category->name' category has been restored successfully!";

            return redirect()->route('blogcategory.index')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(string $id)
    {
        try {
            $category = Blogcategory::withTrashed()->findOrFail($id);
            $category->forceDelete();

            $message = "Permanently deleted successfully!";
            $messageBody = "'$category->name' category has been permanently deleted!";

            return redirect()->route('blogcategory.index')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

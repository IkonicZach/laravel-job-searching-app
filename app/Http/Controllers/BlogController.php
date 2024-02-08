<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCreateRequest;
use App\Models\Blog;
use App\Models\Blogcategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('user', 'blogcategories')->paginate(8);
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Blogcategory::select('id', 'name')->orderBy('name')->get();
        return view('blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCreateRequest $request)
    {
        try {
            $user = auth()->user();

            if ($request->hasFile('thumbnail')) {
                $thumbnail = time() . '.' . $request->thumbnail->extension();
                $request->thumbnail->move(public_path('uploads'), $thumbnail);
            } else {
                $thumbnail = null;
            }

            $blog = Blog::create([
                'user_id' => $user->id,
                'company_id' => $user->company_id ?? null,
                'title' => $request->input('title'),
                'read_time' => $request->input('read_time'),
                'thumbnail' => $thumbnail,
                'content' => $request->content,
            ]);

            $blog->blogcategories()->attach($request->input('category'));

            $message = "Posted Successfully!";
            $messageBody = "Your blog has been successfully posted.";

            return redirect()->route('blog.index')->with(compact('message', 'messageBody'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::with('user', 'blogcategories')->findOrFail($id);
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $blog = Blog::with('blogcategories')->findOrFail($id);
            $categories = Blogcategory::select('id', 'name')->orderBy('name')->get();
            return view('blog.edit', compact('blog', 'categories'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $user = auth()->user();
            $blog = Blog::with('blogcategories')->findOrFail($id);

            if ($request->hasFile('thumbnail')) {
                // Delete old photo from storage
                $thumbnailPath = public_path('uploads/') . $blog->thumbnail;
                // dd($thumbnailPath);
                if (File::exists($thumbnailPath)) {
                    File::delete($thumbnailPath);
                }

                // Update new photo
                $thumbnailName = time() . '.' . $request->thumbnail->extension();
                $request->thumbnail->move(public_path('uploads/'), $thumbnailName);
                $blog->thumbnail = $thumbnailName;
            }

            $blog->update([
                'user_id' => $user->id,
                'company_id' => $user->company_id ?? null,
                'title' => $request->input('title'),
                'read_time' => $request->input('read_time'),
                'content' => $request->input('content'),
            ]);
            $blog->blogcategories()->sync($request->input('category'));

            $message = "Updated Successfully";
            $messageBody = "Your blog has been updated successfully.";
            return redirect()->route('blog.show', $blog->id)->with(compact('message', 'messageBody'));
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
            $blog = Blog::findOrFail($id);
            $blog->delete();

            $message = "Moved successfully!";
            $messageBody = "Blog has been moved to trash successfully!";

            return redirect()->route('blog.index')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function restore(string $id)
    {
        try {
            $blog = Blog::withTrashed()->findOrFail($id);
            $blog->restore();

            $message = "Restored successfully!";
            $messageBody = "Blog has been restored successfully!";

            return redirect()->route('blog.index')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(string $id)
    {
        try {
            $blog = BLog::withTrashed()->findOrFail($id);
            $blog->forceDelete();

            $message = "Permanently deleted successfully!";
            $messageBody = "Blog has been permanently deleted!";

            return redirect()->route('blog.index')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

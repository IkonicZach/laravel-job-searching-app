<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployerCreateRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EmployerController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('employer.profile', compact('user'));
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
        $user = User::findOrFail($id);

        $skills = $request->input('skills', []);
        $proficiency = $request->input('proficiency', []);

        $syncData = [];

        foreach ($skills as $skillId) {
            $syncData[$skillId] = ['proficiency' => $proficiency[$skillId] ?? 50];
        }

        $user->user_skill()->sync($syncData);

        if ($request->hasFile('img')) {
            // Delete old photo from storage
            $imagePath = public_path('uploads/') . $user->img;
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            // Update new photo
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads'), $imageName);
            $user->img = $imageName;
        }

        if ($request->hasFile('cover')) {
            // Delete old photo from storage
            $coverPath = public_path('uploads/') . $user->cover;
            if (File::exists($coverPath)) {
                File::delete($coverPath);
            }

            // Update new photo
            $coverName = time() . '_cover' . $request->cover->extension();
            $request->cover->move(public_path('uploads'), $coverName);
            $user->cover = $coverName;
        }

        if ($request->has('skills')) {
            $user->skills = $request->input('skills', []);
            $user->save();
        }

        $user->update([
            'name' => $request->input('name') ?? $user->name,
            'bio' => $request->input('bio') ?? $user->bio,
            'phone' => $request->input('phone') ?? $user->phone,
            'position' => $request->input('position') ?? $user->position,
            'preferred_category' => $request->input('preferred_category') ?? $user->preferred_category,
            'experience' => $request->input('experience') ?? $user->experience,
            'min_salary' => $request->input('min_salary') ?? $user->min_salary,
            'max_salary' => $request->input('max_salary') ?? $user->max_salary,
            'birthday' => $request->input('birthday') ?? $user->birthday,
            'age' => $user->age,
            'country' => $request->input('country') ?? $user->country,
            'city' => $request->input('city') ?? $user->city,
            'skills' => $request->input('skills', []) ?? $user->skills,
        ]);

        $message = "Updated Successfully!";
        $messageBody = "Your account has been updated successfully!";

        return back()->with(compact('message', 'messageBody'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function setup()
    {
        return view('employer.setup');
    }

    public function doSetup(EmployerCreateRequest $request)
    {
        try {
            $id = $request->input('id');
            $user = User::find($id);

            if ($request->hasFile('img')) {
                $imageName = time() . '.' . $request->img->extension();
                $request->img->move(public_path('uploads'), $imageName);
            } else {
                $imageName = null;
            }

            if ($request->hasFile('cover')) {
                $coverName = time() . '_cover.' . $request->cover->extension();
                $request->cover->move(public_path('uploads'), $coverName);
            } else {
                $coverName = null;
            }

            $user->update([
                'img' => $imageName ?? null,
                'cover' => $coverName ?? null,
                'phone' => $request->input('phone'),
                'birthday' => $request->input('birthday'),
                'age' => $user->age,
                'bio' => $request->input('bio'),
                'country' => $request->input('country'),
                'city' => $request->input('city'),
            ]);
            return redirect()->route('employer.company.create');
        } catch (Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function profile()
    {
        return view('employer.profile');
    }
}

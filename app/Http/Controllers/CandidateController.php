<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateCreateRequest;
use App\Models\Category;
use App\Models\Experiences;
use App\Models\Skill;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = User::role('candidate')->with('user_skill')->paginate(12);
        return view('candidate.listing', compact('candidates'));
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
        try {
            // Get the previous route name from the session
            $previousRouteName = session('url.previous');

            // Check if the user came from the "login" page
            // if ($previousRouteName === 'user.register') {
                $categories = Category::all();
                $skills = Skill::select('id', 'name')->orderBy('name')->get();
                return view('candidate.setup', compact('skills', 'categories'));
            // } else {
                // Redirect the user to a home page
            //     return redirect('/');
            // }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function doSetup(CandidateCreateRequest $request)
    {
        try {
            $id = $request->input('id');
            $user = User::find($id);
            $skills = $request->input('skills', []);
            $proficiency = $request->input('proficiency', []);

            $syncData = [];

            foreach ($skills as $skillId) {
                $syncData[$skillId] = ['proficiency' => $proficiency[$skillId] ?? 50];
            }

            $user->user_skill()->sync($syncData);

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
                'bio' => $request->input('bio'),
                'phone' => $request->input('phone'),
                'position' => $request->input('position'),
                'preferred_category' => $request->input('preferred_category'),
                'birthday' => $request->input('birthday'),
                'age' => $user->age,
                'country' => $request->input('country'),
                'city' => $request->input('city'),
                'skills' => $request->input('skills', []),
            ]);

            if ($request->has('experienceCheck') && $request->input('experienceCheck') == 'on') {
                Experiences::create([
                    'user_id' => auth()->user()->id,
                    'job_title' => $request->input('job_title'),
                    'company_name' => $request->input('company_name'),
                    'location' => $request->input('location'),
                    'start_date' => $request->input('start_date'),
                    'end_date' => $request->input('end_date'),
                    'description' => $request->input('description'),
                ]);
            }

            return redirect()->route('job.index');
        } catch (Exception $e) {
            return 'Error: ' . $e->getMessage();
        }

    }
}

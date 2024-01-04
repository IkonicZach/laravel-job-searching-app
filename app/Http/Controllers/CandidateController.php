<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateCreateRequest;
use App\Models\Category;
use App\Models\Skill;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class CandidateController extends Controller
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
        //
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
            $categories = Category::all();
            $skills = Skill::select('id', 'name')->orderBy('name')->get();
            return view('candidate.setup', compact('skills', 'categories'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function doSetup(CandidateCreateRequest $request)
    {
        try {
            $id = $request->input('id');
            $user = User::find($id);
            if ($request->hasFile('img')) {
                $imageName = time() . '.' . $request->img->extension();
                $request->img->move(public_path('uploads'), $imageName);
            }
            $user->update([
                'img' => $imageName ?? null,
                'phone' => $request->input('phone'),
                'preferred_category' => $request->input('preferred_category'),
                'age' => $request->input('age'),
                'country' => $request->input('country'),
                'city' => $request->input('city'),
                'skills' => $request->input('skills', []),
            ]);
            return redirect()->route('job.index');
        } catch (Exception $e) {
            return 'Error: ' . $e->getMessage();
        }

    }
}

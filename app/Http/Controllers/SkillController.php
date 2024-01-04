<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Exception;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();
        return view('admin.tabs.skills', compact('skills'));
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
            $validated = $request->validate([
                'name' => "required",
            ]);

            Skill::create($validated);
            $message = "Created successfully!";
            $messageBody = "A new skill has been created successfully!";
            return redirect()->route('skill.index')->with('message', $message)->with('messageBody', $messageBody);
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
            $validated = $request->validate([
                'name' => 'required',
            ]);
            $skill = Skill::findOrFail($id);
            $skill->update($validated);
            $message = "Updated successfully!";
            $messageBody = "A skill has been updated successfully!";
            return redirect()->route('skill.index')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

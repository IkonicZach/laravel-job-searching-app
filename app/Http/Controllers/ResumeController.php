<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResumeCreateRequest;
use App\Models\Resume;
use App\Models\Skill;
use Exception;
use Illuminate\Http\Request;

class ResumeController extends Controller
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
        $skills = Skill::select('id', 'name')->orderBy('name')->get();
        return view('candidate.resume.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResumeCreateRequest $request)
    {
        try {
            if ($request->hasFile('img')) {
                $imageName = time() . '.' . $request->img->extension();
                $request->img->move(public_path('uploads/resume'), $imageName);
            }

            Resume::create([
                'user_id' => $request->input('user_id'),
                'name' => $request->input('name'),
                'age' => $request->input('age'),
                'img' => $imageName,
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'linkedin' => $request->input('linkedin'),
                'address' => $request->input('address'),
                'education_status' => $request->input('education_status'),
                'degree' => $request->input('degree'),
                'institution_name' => $request->input('institution_name'),
                'major' => $request->input('major'),
                'graduation_date' => $request->input('graduation_date'),
                'job_title' => $request->input('job_title'),
                'company_name' => $request->input('company_name'),
                'location' => $request->input('location'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'job_description' => $request->input('job_description'),
                'skills' => $request->input('skills', []),
                'certificate' => $request->input('certificate'),
                'certificate_issuing_org' => $request->input('certificate_issuing_org'),
                'obtained_date' => $request->input('obtained_date'),
                'goals' => $request->input('goals'),
                'project_name' => $request->input('project_name'),
                'project_description' => $request->input('project_description'),
                'technologies_used' => $request->input('technologies_used'),
                'project_role' => $request->input('project_role'),
                'award' => $request->input('award'),
                'award_issuing_org' => $request->input('award_issuing_org'),
                'received_date' => $request->input('received_date'),
                'languages' => $request->input('languages'),
                'hobbies' => $request->input('hobbies'),
            ]);
            $message = 'Created successfully!';
            $messageBody = 'A new resume has been created successfully!';
            return redirect()->route('user.profile')->with($message)->with($messageBody);

            // return $request->all();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

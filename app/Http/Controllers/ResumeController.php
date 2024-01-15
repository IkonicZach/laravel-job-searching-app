<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResumeCreateRequest;
use App\Http\Requests\ResumeUpdateRequest;
use App\Models\Resume;
use App\Models\Skill;
use App\Models\User;
use Dompdf\Dompdf;
use Dompdf\Options;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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
            $user = User::findOrFail($request->input('user_id'));
            $existingResumesCount = $user->resumes()->count(); // Check the number of existing resumes for the user

            // Limit to 3 resumes
            if ($existingResumesCount >= 3) {
                $message = 'Creation failed!';
                $messageBody = 'You can only have 3 resumes!';
                return redirect()->route('user.profile', $request->user_id)->with(compact('message', 'messageBody'));
            }

            if ($request->hasFile('img')) {
                $imageName = time() . '.' . $request->img->extension();
                $request->img->move(public_path('uploads/resume'), $imageName);
            }

            $resume = Resume::create([
                'title' => $request->input('title'),
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

            $resume->resume_skills()->attach($request->input('skills'));

            $message = 'Created successfully!';
            $messageBody = 'A new resume has been created successfully!';
            return redirect()->route('user.profile', $request->user_id)->with($message)->with($messageBody);

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
        $resume = Resume::with('resume_skills')->findOrFail($id);
        return view('candidate.resume.show', compact('resume'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $resume = Resume::with('resume_skills')->findOrFail($id);
            $skills = Skill::select('id', 'name')->orderBy('name')->get();
            return view('candidate.resume.edit', compact('resume', 'skills'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResumeUpdateRequest $request, string $id)
    {
        try {
            $resume = Resume::findOrFail($id);
            if ($request->hasFile('img')) {
                // Delete old photo from storage
                $photoPath = public_path('uploads/resume/') . $resume->img;
                if (File::exists($photoPath)) {
                    File::delete($photoPath);
                }

                // Update new photo
                $imageName = time() . '.' . $request->img->extension();
                $request->img->move(public_path('uploads/resume'), $imageName);
                $resume->img = $imageName;
            }

            $resume->update([
                'title' => $request->input('title'),
                'user_id' => $request->input('user_id'),
                'name' => $request->input('name'),
                'age' => $request->input('age'),
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

            $message = 'Update successfully';
            $messageBody = 'Your resume has been updated successfully!';
            return redirect()->route('user.profile', $request->user_id)->with(compact('message', 'messageBody'));

            // return $request->img;
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
            $resume = Resume::findOrFail($id);
            $resume->delete();
            $message = "Deleted Successfully!";
            $messageBody = "Your resume has been successfully deleted.";
            return redirect()->route('user.profile', $resume->user_id)->with($message)->with($messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function restore(string $id)
    {
        try {
            $resume = Resume::withTrashed()->findOrFail($id);
            $resume->restore();

            $message = "Restored successfully!";
            $messageBody = "'$resume->name' resume has been restored successfully!";

            return redirect()->route('resume.trash')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(string $id)
    {
        try {
            $resume = Resume::withTrashed()->findOrFail($id);
            // Delete related records in the pivot table
            $resume->resume_skills()->detach();
            $resume->forceDelete();

            $message = "Permanently deleted successfully!";
            $messageBody = "Resume'$resume->id' has been permanently deleted!";

            return redirect()->route('resume.trash')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    private function generatePdf(Resume $resume)
    {
        try {
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);

            $dompdf = new Dompdf($options);

            // Load HTML content (you'll need a Blade view for the resume)
            $html = view('candidate.resume.pdf', ['resume' => $resume])->render();

            $dompdf->loadHtml($html);

            // (Optional) Set paper size and orientation
            $dompdf->setPaper('A4', 'portrait');

            // Render the PDF
            $dompdf->render();

            return $dompdf;
        } catch (Exception $e) {
            //throw $th;
        }

    }

    public function downloadPdf(string $id)
    {
        $resume = Resume::findOrFail($id);
        $pdf = $this->generatePdf($resume);

        return Response::make($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename=resume.pdf',
        ]);
    }

    public function trash()
    {
        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);

        $trashes = Resume::onlyTrashed()->where('user_id', $user->id)->get();
        return view('candidate.resume.trash', compact('trashes'));
    }
}

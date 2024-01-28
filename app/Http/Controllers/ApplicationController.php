<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobApplyRequest;
use App\Models\Application;
use App\Models\Job;
use App\Notifications\JobApplicationNotification;
use Exception;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobApplyRequest $request, string $id)
    {
        try {
            $user_id = $request->input('user_id');
            $job = Job::with('applications')->findOrFail($id);

            if ($job->limit != null) {
                if (count($job->applications) >= $job->limit) {
                    $message = "Application Failed!";
                    $messageBody = "Application is full. You cannot apply anymore.";
                    return back()->with(compact('message', 'messageBody'));
                }
            }

            $count = Application::where('user_id', $user_id)
                ->where('job_id', $id)
                ->count();

            if ($count > 0) { // Checking whether user has already applied or not
                $message = "Application failed!";
                $messageBody = "You have already applied to this job.";
                return redirect()->route('job.show', $id)->with(compact('message', 'messageBody'));
            } else {
                $resumeName = time() . '.' . $request->resume_path->extension();
                $request->resume_path->move(public_path('downloads/resume'), $resumeName); // Storing resume

                $application = Application::create([
                    'user_id' => $user_id,
                    'job_id' => $job->id,
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'resume_path' => $resumeName,
                ]);

                $application->notify(new JobApplicationNotification($application));

                $count = Application::where('job_id', $job->id)->count();
                if ($count >= $job->limit) {
                    $job->status = "unavailable";
                    $job->save();
                }

                $message = "Applied successfully!";
                $messageBody = "You have successfully applied the job.";
                return redirect()->route('job.show', $id)->with(compact('message', 'messageBody'));
            }
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
        try {
            $application = Application::findOrFail($id);
            $application->delete();

            $message = "Moved successfully!";
            $messageBody = "Your application has been moved to trash successfully!";

            return redirect()->route('candidate.applications', $application->user_id)->with(compact('message', 'messageBody'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function restore(string $id)
    {
        try {
            $application = Application::withTrashed()->findOrFail($id);
            $application->restore();

            $message = "Restored successfully!";
            $messageBody = "Your application has been restored successfully!";

            return redirect()->route('candidate.applications', $application->user_id)->with(compact('message', 'messageBody'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(string $id)
    {
        try {
            $application = Application::withTrashed()->findOrFail($id);
            $application->forceDelete();

            $message = "Permanently deleted successfully!";
            $messageBody = "Your application has been permanently deleted!";

            return redirect()->route('candidate.applications', $application->user_id)->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function applicationsByEmployer($id)
    {
        $applications = Application::with('user')->where('job_id', $id)->get();
        return view('job.applications', compact('applications'));
    }

    public function applicationsByCandidate($id)
    {
        $applications = Application::with('user')->where('user_id', $id)->take(4)->get();
        return view('candidate.applications', compact('applications'));
    }
}

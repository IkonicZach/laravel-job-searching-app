<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceRequest;
use App\Models\Experiences;
use App\Models\User;
use Exception;

class ExperienceController extends Controller
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
    public function store(ExperienceRequest $request)
    {
        try {
            $user_id = auth()->user()->id;
            $user = User::findOrFail($user_id);
            if (count($user->experiences) >= 5) {
                $message = "Adding Experience Failed";
                $messageBody = "You can't add more than 5 Experiences";
                return redirect()->route('user.profile', $user_id)->with(compact('message', 'messageBody'));
            } else {
                Experiences::create([
                    "user_id" => $user_id,
                    "job_title" => $request->input('job_title'),
                    "company_name" => $request->input('company_name'),
                    "location" => $request->input('location'),
                    "start_date" => $request->input('start_date'),
                    "end_date" => $request->input('end_date'),
                    "description" => $request->input('description'),
                ]);

                $message = "Experience Added Successfully";
                $messageBody = "A new experience has been added successfully!";
                return redirect()->route('user.profile', $user_id)->with(compact('message', 'messageBody'));
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
     * Update the specified resource in storage.
     */
    public function update(ExperienceRequest $request, string $id)
    {
        try {
            $experience = Experiences::findOrFail($id);
            $experience->update([
                "user_id" => auth()->user()->id,
                "job_title" => $request->input('job_title'),
                "company_name" => $request->input('company_name'),
                "location" => $request->input('location'),
                "start_date" => $request->input('start_date') ?? $experience->start_date,
                "end_date" => $request->input('end_date') ?? $experience->end_date,
                "description" => $request->input('description'),
            ]);

            $message = "Experience updated Successfully";
            $messageBody = "The experience infos has been updated successfully!";

            return redirect()->route('user.profile', auth()->user()->id)->with(compact('message', 'messageBody'));
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
            $experience = Experiences::findOrFail($id);
            $experience->delete();

            $message = "Moved to trash successfully";
            $messageBody = "An experience has been moved to trash successfully!";

            return redirect()->route('user.profile', auth()->user()->id)->with(compact('message', 'messageBody'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function restore(string $id)
    {
        try {
            $experience = Experiences::withTrashed()->findOrFail($id);
            $experience->restore();

            $message = "Restored successfully!";
            $messageBody = "Your experience has been restored successfully!";

            return redirect()->route('user.profile', auth()->user()->id)->with(compact('message', 'messageBody'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(string $id)
    {
        try {
            $experience = Experiences::withTrashed()->findOrFail($id);
            $experience->forceDelete();

            $message = "Permanently deleted successfully!";
            $messageBody = "Your experience has been permanently deleted!";

            return redirect()->route('user.profile', auth()->user()->id)->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

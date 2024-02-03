<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Skill;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::select('id', 'name')->get();
        $users = User::paginate(10);
        $categories = Category::select('id', 'name')->get();
        $skills = Skill::select('id', 'name')->orderBy('name')->get();
        return view('admin.tabs.users', compact('users', 'roles', 'categories', 'skills'));
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
            'experience' => $request->input('experience') ?? $user->experience,
            'min_salary' => $request->input('min_salary') ?? $user->min_salary,
            'max_salary' => $request->input('max_salary') ?? $user->max_salary,
            'birthday' => $request->input('birthday') ?? $user->birthday,
            'age' => $user->age,
            'country' => $request->input('country') ?? $user->country,
            'city' => $request->input('city') ?? $user->city,
            'skills' => $request->input('skills', []) ?? $user->skills,
        ]);

        $message = "User Updated Successfully!";
        $messageBody = "User information has been updated successfully!";

        return back()->with(compact('message', 'messageBody'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(string $id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function assign(Request $request, string $id)
    {
        try {
            $user = User::findOrFail($id);
            $role = $request->input('role');

            $user->assignRole($role);
            return redirect()->route('user-management.index')->with('message', 'Role assigned successfully.');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function revoke(Request $request, string $id)
    {
        try {
            $user = User::findOrFail($id);
            $role = $request->input('role');

            $user->assignRole($role);
            return redirect()->route('user-management.index')->with('message', 'Role assigned successfully.');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deactivate(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            $message = 'User Deactivated';
            $messageBody = 'User"s account has been deactivated successfully!';

            return back()->with(compact('message', 'messageBody'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
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
        return view('admin.tabs.users', compact('users', 'roles'));
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
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::select('id', 'name')->orderBy('name')->get();
        return view('admin.tabs.roles', compact('roles', 'permissions'));
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
        $validated = $request->validate([
            'name' => 'required|min:3',
        ]);
        Role::create($validated);
        return redirect()->route('role.index');
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

    public function assign(Request $request, string $id)
    {
        try {
            $role = Role::findOrFail($id);
            $permissions = $request->input('permissions', []);

            $role->givePermissionTo($permissions);
            $message = "Assigned successfully!";
            $messageBody = "Permissions have been updated successfully!";

            return redirect()->route('role.index')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function revoke(string $roleId, string $permissionId)
    {
        try {
            $role = Role::findOrFail($roleId);
            $permission = $role->permissions()->findOrFail($permissionId);
            $message = "Revoked successfully!";
            $messageBody = "'$permission->name' permission has been revoked successfully!";

            $role->revokePermissionTo($permission);
            return redirect()->route('role.index')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

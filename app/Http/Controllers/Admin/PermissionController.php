<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::select('id', 'name')->paginate(5);
        return view('admin.tabs.permissions', compact('permissions', 'roles'));
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
        Permission::create($validated);
        return redirect()->route('permission.index');
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
                'name' => 'required|min:3',
            ]);
            $permission = Permission::findOrFail($id);
            $permission->update($validated);
            return redirect()->route('permission.index');
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
            $permission = Permission::findOrFail($id);
            $permission->delete();
            $message = "Deleted successfully!";
            $messageBody = "'$permission->name' permission has been deleted successfully!";

            return redirect()->route('permission.index')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function restore(string $id)
    {
        try {
            $permission = Permission::withTrashed()->findOrFail($id);
            $permission->restore();

            $message = "Restored successfully!";
            $messageBody = "'$permission->name' permission has been restored successfully!";

            return redirect()->route('trash.permission')->with('message', $message)->with('messageBody', $messageBody);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function assign(Request $request, string $id)
    {
        try {
            $permission = Permission::findOrFail($id);
            $roles = $request->input('roles', []);

            $permission->assignRole($roles);
            return redirect()->route('permission.index')->with('success', 'Permissions updated successfully.');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('name')->toArray();
        $admin->syncPermissions($permissions);

        $employer = Role::create(['name' => 'employer']);
        $employer->givePermissionTo(['post-job', 'edit-job', 'delete-job', 'save-user', 'create-company', 'edit-company', 'delete-company']);

        $candidate = Role::create(['name' => 'candidate']);
        $candidate->givePermissionTo(['apply-job', 'build-resume', 'edit-resume', 'delete-resume', 'save-job']);
    }
}

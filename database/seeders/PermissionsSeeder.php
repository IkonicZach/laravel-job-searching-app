<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'apply-job',
            'post-job',
            'edit-job',
            'delete-job',
            'build-resume',
            'edit-resume',
            'delete-resume',
            'save-job',
            'save-user',
            'create-company',
            'edit-company',
            'delete-company',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}

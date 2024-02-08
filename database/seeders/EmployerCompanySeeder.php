<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmployerCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $i = 1;
        foreach ($users as $user) {
            if ($user->hasRole('employer')) {
                $user->update(['company_id' => $i]);
                $i++;
            }
        }

        $companies = Company::all();
        $j = 17;
        foreach ($companies as $company) {
            $company->update(['created_by' => $j]);
            $j++;
        }
    }
}

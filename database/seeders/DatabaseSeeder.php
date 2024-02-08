<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionsSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SubcategoriesTableSeeder::class);
        $this->call(BlogCategorySeeder::class);
        $this->call(CandidateSeeder::class);
        $this->call(EmployerSeeder::class);
        $this->call(UserSkillSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(EmployerCompanySeeder::class);
        $this->call(JobSeeder::class);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Software Development',
            'created_by' => '1',
            'updated_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Database Management',
            'created_by' => '1',
            'updated_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Network and Infrastructure',
            'created_by' => '1',
            'updated_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Cybersecurity',
            'created_by' => '1',
            'updated_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Business Analysis',
            'created_by' => '1',
            'updated_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Project Management',
            'created_by' => '1',
            'updated_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Quality Assurance (QA) and Testing',
            'created_by' => '1',
            'updated_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'User Experience (UX) and User Interface (UI) Design',
            'created_by' => '1',
            'updated_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Data Science and Analytics',
            'created_by' => '1',
            'updated_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Artificial Intelligence (AI)',
            'created_by' => '1',
            'updated_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Internet of Things (IoT)',
            'created_by' => '1',
            'updated_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}

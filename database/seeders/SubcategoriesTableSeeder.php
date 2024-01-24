<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        // Software Development
        DB::table('subcategories')->insert([
            'name' => 'Application Development',
            'category_id' => $categoryIds[0],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('subcategories')->insert([
            'name' => 'Web Development',
            'category_id' => $categoryIds[0],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('subcategories')->insert([
            'name' => 'Mobile App Development',
            'category_id' => $categoryIds[0],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Database Management
        DB::table('subcategories')->insert([
            'name' => 'Database Administration (DBA)',
            'category_id' => $categoryIds[1],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('subcategories')->insert([
            'name' => 'Data Warehousing',
            'category_id' => $categoryIds[1],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Network and Infrastructure
        DB::table('subcategories')->insert([
            'name' => 'Network Administration',
            'category_id' => $categoryIds[2],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('subcategories')->insert([
            'name' => 'System Administration',
            'category_id' => $categoryIds[2],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('subcategories')->insert([
            'name' => 'Cloud Computing',
            'category_id' => $categoryIds[2],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Cybersecurity
        DB::table('subcategories')->insert([
            'name' => 'Network Security',
            'category_id' => $categoryIds[3],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('subcategories')->insert([
            'name' => 'Information Security',
            'category_id' => $categoryIds[3],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('subcategories')->insert([
            'name' => 'Ethical Hacking/Penetration Testing',
            'category_id' => $categoryIds[3],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Business Analysis
        DB::table('subcategories')->insert([
            'name' => 'Business Intelligence (BI)',
            'category_id' => $categoryIds[4],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('subcategories')->insert([
            'name' => 'Systems Analysis',
            'category_id' => $categoryIds[4],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Project Management
        DB::table('subcategories')->insert([
            'name' => 'IT Project Management',
            'category_id' => $categoryIds[5],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Quality Assurance (QA) and Testing
        DB::table('subcategories')->insert([
            'name' => 'Software Testing',
            'category_id' => $categoryIds[6],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // User Experience (UX) and User Interface (UI) Design
        DB::table('subcategories')->insert([
            'name' => 'UI Design',
            'category_id' => $categoryIds[7],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('subcategories')->insert([
            'name' => 'UX Design',
            'category_id' => $categoryIds[7],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Data Science and Analytics
        DB::table('subcategories')->insert([
            'name' => 'Data Analytics',
            'category_id' => $categoryIds[8],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('subcategories')->insert([
            'name' => 'Machine Learning',
            'category_id' => $categoryIds[8],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Artificial Intelligence (AI)
        DB::table('subcategories')->insert([
            'name' => 'Natural Language Processing (NLP)',
            'category_id' => $categoryIds[9],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('subcategories')->insert([
            'name' => 'Computer Vision',
            'category_id' => $categoryIds[9],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Internet of Things (IoT)
        DB::table('subcategories')->insert([
            'name' => 'IoT Development',
            'category_id' => $categoryIds[10],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('subcategories')->insert([
            'name' => 'IoT Security',
            'category_id' => $categoryIds[10],
            'created_by' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}

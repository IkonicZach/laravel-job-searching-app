<?php

namespace Database\Seeders;

use App\Models\Blogcategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Blogcategory::create([
            'name' => 'Tutorial',
            'created_by' => '1',
        ]);

        Blogcategory::create([
            'name' => 'News',
            'created_by' => '1',
        ]);

        Blogcategory::create([
            'name' => 'Tips',
            'created_by' => '1',
        ]);

        Blogcategory::create([
            'name' => 'Article',
            'created_by' => '1',
        ]);

        Blogcategory::create([
            'name' => 'Event',
            'created_by' => '1',
        ]);

        Blogcategory::create([
            'name' => 'Javascript',
            'created_by' => '1',
        ]);

        Blogcategory::create([
            'name' => 'Laravel',
            'created_by' => '1',
        ]);

        Blogcategory::create([
            'name' => 'Security',
            'created_by' => '1',
        ]);

        Blogcategory::create([
            'name' => 'Machine Learning',
            'created_by' => '1',
        ]);

        Blogcategory::create([
            'name' => 'Cyber Security',
            'created_by' => '1',
        ]);
    }
}

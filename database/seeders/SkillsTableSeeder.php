<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::create([
            'name' => 'HTML/CSS',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'Javascript',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'Java',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'Python',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'C#',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'C++',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'PHP',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'Swift',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'Ruby',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'SQL',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'MySQL',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'PostgreSQL',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'Oracle',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'MongoDB',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'NoSQL',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'Ethical Hacking',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'Security Analysis',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'Security Protocols',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'Machine Learning',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'UI Design',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Skill::create([
            'name' => 'UX Design',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}

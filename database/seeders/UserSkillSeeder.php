<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::all();

        foreach ($users as $user) {
            $userSkills = json_decode($user->skills, true);

            // Ensure it's an array and not null
            if (is_array($userSkills)) {
                foreach ($userSkills as $skillId) {
                    // Convert skill_id to integer
                    $skillId = intval($skillId);

                    if (!empty($skillId)) {
                        $proficiency = rand(30, 100);

                        $user->user_skill()->attach($skillId, ['proficiency' => $proficiency]);
                    }
                }
            }
        }
    }
}

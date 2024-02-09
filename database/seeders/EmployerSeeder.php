<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersData = [
            [
                'name' => 'Thu Ta Minn',
                'email' => 'thutaminn457@gmail.com',
                'password' => bcrypt('thutaminn457'),
                'img' => 'tt.jpg',
                'cover' => '1.jpg',
                'bio' => 'Passionate software engineer with a love for problem-solving and a knack for creating efficient and scalable solutions. Always eager to stay ahead in the ever-evolving tech landscape',
                'company_id' => null,
                'position' => 'Web Developer',
                'birthday' => '2003-05-02',
                'age' => 20,
                'phone' => '09943985243',
                'country' => 'Myanmar',
                'city' => 'Yangon',
                'skills' => '["1","2","3","4","5","6"]',
                'preferred_category' => 10,
                'experience' => '2 Years',
                'min_salary' => 500,
                'max_salary' => 2000,
            ],
            [
                'name' => 'Mikel Daniela',
                'email' => 'mikeldaniela@gmail.com',
                'password' => bcrypt('mikeldaniela'),
                'img' => '04.jpg',
                'cover' => '2.jpg',
                'bio' => 'DevOps enthusiast with a strong background in automating processes and optimizing infrastructure. Continuously seeking ways to enhance deployment pipelines for seamless software delivery.',
                'company_id' => null,
                'position' => 'System Audit',
                'birthday' => '1991-01-23',
                'age' => 33,
                'phone' => '09943985243',
                'country' => 'United States',
                'city' => 'New York',
                'skills' => '["19","18","17","2","10","12"]',
                'preferred_category' => 5,
                'experience' => '10 Years',
                'min_salary' => 1500,
                'max_salary' => 3000,
            ],
            [
                'name' => 'Fabian Lopez',
                'email' => 'fabianlopez@gmail.com',
                'password' => bcrypt('fabianlopez'),
                'img' => '01.jpg',
                'cover' => '1.jpg',
                'bio' => 'Detail-oriented quality assurance engineer with a passion for ensuring software reliability and user satisfaction. Proficient in manual and automated testing methodologies.',
                'company_id' => null,
                'position' => 'Quality Assurance Engineer',
                'birthday' => '1987-12-02',
                'age' => 37,
                'phone' => '09943985243',
                'country' => 'United States',
                'city' => 'New York',
                'skills' => '["9","3","6","2","10","12"]',
                'preferred_category' => 5,
                'experience' => '10 Years',
                'min_salary' => 1500,
                'max_salary' => 3000,
            ],
            [
                'name' => 'Minka Kelly',
                'email' => 'minkakelly@gmail.com',
                'password' => bcrypt('minkakelly'),
                'img' => '05.jpg',
                'cover' => '3.jpg',
                'bio' => 'Full-stack developer blending creativity with technical expertise. Specializing in building user-centric applications that marry functionality with a polished user interface.',
                'company_id' => null,
                'position' => 'System Audit',
                'birthday' => '1999-4-25',
                'age' => 37,
                'phone' => '09942474613',
                'country' => 'United States',
                'city' => 'New York',
                'skills' => '["20","21","1","6","10","12"]',
                'preferred_category' => 10,
                'experience' => '3 Years',
                'min_salary' => 1000,
                'max_salary' => 1500,
            ],
            [
                'name' => 'Jordi Alves',
                'email' => 'jordialves@gmail.com',
                'password' => bcrypt('justinalba'),
                'img' => '02.jpg',
                'cover' => '3.jpg',
                'bio' => 'Data scientist with a passion for uncovering insights from complex datasets. Proficient in machine learning and statistical analysis, dedicated to transforming raw data into actionable business intelligence.',
                'company_id' => null,
                'position' => 'Data Scientist',
                'birthday' => '1987-12-02',
                'age' => 37,
                'phone' => '09973658253',
                'country' => 'United States',
                'city' => 'New York',
                'skills' => '["12","3","15","17","20","10"]',
                'preferred_category' => 1,
                'experience' => '12 Years',
                'min_salary' => 1800,
                'max_salary' => 3000,
            ],
            [
                'name' => 'Christina Mhi',
                'email' => 'christinamhi@gmail.com',
                'password' => bcrypt('christinamhi'),
                'img' => '05.jpg',
                'cover' => '1.jpg',
                'bio' => 'Experienced IT project manager skilled in orchestrating cross-functional teams and delivering high-impact projects on time and within budget. Adept at mitigating risks and ensuring stakeholder satisfaction.',
                'company_id' => null,
                'position' => 'Project Manager',
                'birthday' => '2004-07-12',
                'age' => 19,
                'phone' => '09420930238',
                'country' => 'Myanmar',
                'city' => 'Yangon',
                'skills' => '["5","1","16","18","6","21"]',
                'preferred_category' => 2,
                'experience' => '1 Year',
                'min_salary' => 1000,
                'max_salary' => 1200,
            ],
            [
                'name' => 'Roberto Santos',
                'email' => 'robertosantos@gmail.com',
                'password' => bcrypt('robertosantos'),
                'img' => '06.jpg',
                'cover' => '2.jpg',
                'bio' => 'Cybersecurity specialist committed to safeguarding digital assets and implementing robust security measures. Skilled in penetration testing, threat analysis, and incident response.',
                'company_id' => null,
                'position' => 'Cybersecurity Specialist',
                'birthday' => '1987-12-02',
                'age' => 37,
                'phone' => '09943985243',
                'country' => 'United States',
                'city' => 'New York',
                'skills' => '["9","3","6","2","10","12"]',
                'preferred_category' => 5,
                'experience' => '10 Years',
                'min_salary' => 1500,
                'max_salary' => 3000,
            ],
            [
                'name' => 'Floppy Sanchez',
                'email' => 'floppysanchez@gmail.com',
                'password' => bcrypt('floppysanchez'),
                'img' => '04.jpg',
                'cover' => '3.jpg',
                'bio' => 'Cloud architect with a focus on designing and implementing scalable, secure, and cost-effective cloud solutions. Expertise in AWS, Azure, and Google Cloud Platform.',
                'company_id' => null,
                'position' => 'Frontend Engineer',
                'birthday' => '1995-12-5',
                'age' => 29,
                'phone' => '09654368712',
                'country' => 'United States',
                'city' => 'New York',
                'skills' => '["9","3","6","2","10","12"]',
                'preferred_category' => 5,
                'experience' => '10 Years',
                'min_salary' => 1500,
                'max_salary' => 3000,
            ],
            [
                'name' => 'Nakamura',
                'email' => 'nakamura@gmail.com',
                'password' => bcrypt('nakamura'),
                'img' => 'ok.jpg',
                'cover' => '1.jpg',
                'bio' => 'Network engineer with a passion for optimizing network performance and ensuring seamless connectivity. Experienced in designing, implementing, and managing enterprise-level networks.',
                'company_id' => null,
                'position' => 'Network Engineer',
                'birthday' => '1999-10-18',
                'age' => 24,
                'phone' => '09623971467',
                'country' => 'Japan',
                'city' => 'Nagoya',
                'skills' => '["9","3","6","2","10","12"]',
                'preferred_category' => 5,
                'experience' => '5 Years',
                'min_salary' => 1000,
                'max_salary' => 1200,
            ],
            [
                'name' => 'Tsubasa',
                'email' => 'tsubasa@gmail.com',
                'password' => bcrypt('tsubasa'),
                'img' => '04.jpg',
                'cover' => '3.jpg',
                'bio' => 'UI/UX designer with a keen eye for aesthetics and a user-centered design approach. Proficient in creating intuitive and visually appealing interfaces that enhance the overall user experience',
                'company_id' => null,
                'position' => 'UI/UX designer',
                'birthday' => '2001-03-12',
                'age' => 23,
                'phone' => '09943985243',
                'country' => 'Japan',
                'city' => 'Nagoya',
                'skills' => '["20","21","6","2","10","12"]',
                'preferred_category' => 7,
                'experience' => '5 Years',
                'min_salary' => 800,
                'max_salary' => 1200,
            ],
            [
                'name' => 'Josh Edmondson',
                'email' => 'joshedmondson@gmail.com',
                'password' => bcrypt('joshedmondson'),
                'img' => '07.jpg',
                'cover' => '2.jpg',
                'bio' => 'System administrator with a knack for optimizing server performance and ensuring the reliability of IT infrastructure. Experienced in managing Linux and Windows environments.',
                'company_id' => null,
                'position' => 'System administrator',
                'birthday' => '1993-08-31',
                'age' => 31,
                'phone' => '0923158112',
                'country' => 'United States',
                'city' => 'New York',
                'skills' => '["4","5","6","2","10","20"]',
                'preferred_category' => 8,
                'experience' => '10 Years',
                'min_salary' => 3500,
                'max_salary' => 5000,
            ],
            [
                'name' => 'Harry Nerd',
                'email' => 'harrynerd@gmail.com',
                'password' => bcrypt('harrynerd'),
                'img' => '08.jpg',
                'cover' => '2.jpg',
                'bio' => 'IT consultant with a diverse skill set encompassing systems integration, IT strategy, and project management. Committed to driving digital transformation for clients.',
                'company_id' => null,
                'position' => 'IT consultant',
                'birthday' => '1985-12-02',
                'age' => 39,
                'phone' => '09943985243',
                'country' => 'United States',
                'city' => 'New York',
                'skills' => '["10","8","6","2","10","12"]',
                'preferred_category' => 2,
                'experience' => '20 Years',
                'min_salary' => 3000,
                'max_salary' => 4500,
            ],
        ];

        foreach ($usersData as $usersData) {
            $user = User::create([
                'name' => $usersData['name'],
                'email' => $usersData['email'],
                'password' => $usersData['password'],
                'img' => $usersData['img'],
                'cover' => $usersData['cover'],
                'bio' => $usersData['bio'],
                'company_id' => $usersData['company_id'],
                'position' => $usersData['position'],
                'birthday' => $usersData['birthday'],
                'age' => $usersData['age'],
                'phone' => $usersData['phone'],
                'country' => $usersData['country'],
                'city' => $usersData['city'],
                'skills' => $usersData['skills'],
                'preferred_category' => $usersData['preferred_category'],
                'experience' => $usersData['experience'],
                'min_salary' => $usersData['min_salary'],
                'max_salary' => $usersData['max_salary'],
            ]);

            $user->assignRole('employer');
        }
    }
}
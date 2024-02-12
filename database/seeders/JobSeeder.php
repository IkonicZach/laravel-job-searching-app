<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $title = [
            'IT Systems Administrator',
            'Software Developer (Full Stack)',
            'Software Engineer',
            'Network Administrator',
            'Data Scientist',
            'Web Developer',
            'IT Project Manager',
            'Database Administrator',
            'Cybersecurity Analyst',
            'Systems Analyst',
            'UI/UX Designer',
            'DevOps Engineer',
            'Cloud Solutions Architect',
            'Business Intelligence Analyst',
            'QA Engineer',
            'Network Security Engineer',
            'IT Support Specialist',
            'Mobile App Developer',
            'AI/Machine Learning Engineer',
            'IT Consultant',
            'ERP Specialist',
            'IT Trainer',
            'Blockchain Developer',
            'IT Compliance Analyst',
        ];
        $description = [
            "Join our dynamic IT team as a Systems Administrator, responsible for maintaining and optimizing our organization's IT infrastructure. You will play a crucial role in ensuring the seamless operation of our systems.",
            "Be a key contributor to our software development team, working on exciting projects that leverage the latest technologies. Join us in creating innovative solutions for our clients.",
            "Join our dynamic software development team to design, develop, test, and maintain high-quality software solutions. Collaborate with cross-functional teams to deliver cutting-edge applications, ensuring optimal performance and user experience.",
            "Be a vital part of our IT infrastructure team, responsible for managing and maintaining our network systems. Ensure seamless connectivity, troubleshoot issues, and implement security protocols to safeguard our network infrastructure.",
            "Unlock the power of data! As a Data Scientist, you will analyze complex datasets, develop models, and provide insights that drive strategic decision-making. Leverage your expertise in statistics, machine learning, and programming to extract valuable information from data.",
            "Join our web development team to create and maintain visually appealing, user-friendly websites. Utilize your skills in HTML, CSS, and JavaScript to build responsive and interactive web applications, ensuring a seamless online experience for our users.",
            "Lead and coordinate IT projects from inception to completion. As an IT Project Manager, you'll be responsible for planning, executing, and closing projects, ensuring they are delivered on time and within scope, while managing resources effectively.",
            "Be the guardian of our data! As a Database Administrator, you will design, implement, and maintain robust database systems. Ensure data integrity, optimize performance, and troubleshoot issues to guarantee a secure and efficient data environment.",
            "Protect our digital assets! Join our cybersecurity team to analyze and implement security measures, monitor for potential threats, and respond to incidents. Your role is crucial in maintaining the integrity and confidentiality of our information.",
            "Work at the intersection of technology and business processes. As a Systems Analyst, you'll analyze and optimize our IT systems, ensuring they align with organizational goals. Collaborate with stakeholders to enhance efficiency and drive innovation.",
            "Craft visually appealing and user-friendly interfaces! Join our design team to create intuitive user experiences. As a UI/UX Designer, you'll be responsible for wireframing, prototyping, and ensuring that our applications provide a seamless and engaging user journey.",
            "Bridge the gap between development and operations. As a DevOps Engineer, automate and streamline our processes, from code deployment to system maintenance. Enhance collaboration and efficiency by implementing continuous integration and delivery practices.",
            "Architect and implement scalable and secure cloud solutions. As a Cloud Solutions Architect, you'll design cloud infrastructure, select appropriate services, and ensure seamless integration, optimizing performance and cost-effectiveness.",
            "Turn raw data into actionable insights! Join our business intelligence team to gather, analyze, and visualize data. As a Business Intelligence Analyst, you'll provide valuable insights to support strategic decision-making within the organization.",
            "Ensure the delivery of high-quality software by testing applications and identifying defects before release. Collaborate with developers to maintain product quality standards.",
            "Focus on safeguarding our network infrastructure by implementing security measures, monitoring for vulnerabilities, and responding to cyber threats to ensure a secure and resilient network.",
            "Provide technical support to end-users, resolving hardware and software issues. Troubleshoot problems, offer solutions, and ensure a smooth IT experience for all employees.",
            "Create innovative mobile applications for iOS and Android platforms. Utilize programming languages and frameworks to develop responsive and user-friendly mobile solutions.",
            "Work on cutting-edge projects by designing and implementing machine learning algorithms and artificial intelligence solutions. Solve complex problems using advanced data analytics.",
            "Offer expert advice to clients on optimizing their IT infrastructure. Collaborate with organizations to identify opportunities for improvement and implement tailored IT solutions.",
            "Manage and optimize enterprise software systems to streamline business processes. Specialize in ERP solutions to enhance efficiency and data integration across departments.",
            "Educate and empower employees with the latest IT skills. Develop training programs, conduct workshops, and ensure staff members are proficient in using IT tools and systems.",
            "Explore the innovative world of blockchain technology. Develop decentralized applications, smart contracts, and contribute to the evolution of secure and transparent digital ecosystems.",
            "Ensure adherence to regulatory requirements and industry standards. Assess and implement compliance measures, conduct audits, and maintain documentation to meet legal and regulatory obligations.",
        ];
        $responsibilities = "Manage and troubleshoot servers, networks, and virtual environments.
Install and upgrade software and hardware components.
Monitor system performance and ensure security protocols are in place.
Provide technical support to end-users.";
        $requirements = "Bachelor's degree in Computer Science or related field.
Proven experience as a Systems Administrator.
Strong knowledge of system security and data backup/recovery.
Excellent troubleshooting skills.";
        $benefits = "Health and dental insurance.
Professional development opportunities.
Flexible work hours.";
        $employment_type = ['Full-time', 'Part-time', 'Freelance', 'Remote', 'Hourly-basics', 'Fixed-price'];
        $type = ['Remote', 'Hybrid', 'On-site'];
        $country = ['United States', 'United States', 'United States', 'United States', 'China', 'United States', 'South Korea', 'United States', 'United States', 'United Kingdom', 'United Kingdom', 'United States'];
        $city = ['New York', 'New York', 'New York', 'New York', 'Beijing', 'New York', 'Seoul', 'New York', 'New York', 'Birmingham', 'Birmingham', 'New York'];
        $address = [
            "123 Maple Avenue, New York, NY 10001",
            "456 Pine Street, Los Angeles, CA 90012",
            "789 Oak Boulevard, Chicago, IL 60603",
            "101 Cedar Drive, Houston, TX 77002",
            "123 Red Street, Beijing, 100001",
            "123 Oak Street, New York, NY 10001",
            "111 Maple Street, Seoul, 03111",
            "202 Cedar Boulevard, Miami, FL 33105",
            "303 Birch Square, San Francisco, CA 94106",
            "1 Primrose Close, London, SW1A 1AA",
            "2 Rose Avenue, Manchester, M1 1AB",
            "303 Birch Square, San Francisco, CA 94106",
        ];
        $limit = [null, 10, 20, 30, 40, 50];
        $j = 0;

        // Used 2 variables. $i for seeding 24 job titles, description and $j for seeding columns that has only 12 values.
        for ($i = 0; $i < 24; $i++) {
            $randomLimit = rand(0, count($limit) - 1); // random limit
            $randomEmpType = rand(0, count($employment_type) - 1); // random employment type
            $randomType = rand(0, count($type) - 1); // random type
            $startDate = Carbon::parse('2022-01-01');
            $endDate = Carbon::parse('2022-12-31');
            $cat = rand(1, 11);
            switch ($cat) {
                case 1:
                    $subcat = rand(1, 3);
                    break;
                case 2:
                    $subcat = rand(4, 5);
                    break;
                case 3:
                    $subcat = rand(6, 8);
                    break;
                case 4:
                    $subcat = rand(9, 11);
                    break;
                case 5:
                    $subcat = rand(12, 13);
                    break;
                case 6:
                    $subcat = 14;
                    break;
                case 7:
                    $subcat = 15;
                    break;
                case 8:
                    $subcat = rand(16, 17);
                    break;
                case 9:
                    $subcat = rand(18, 19);
                    break;
                case 10:
                    $subcat = rand(20, 21);
                    break;
                case 11:
                    $subcat = rand(22, 23);
                    break;
            }

            Job::create([
                'company_id' => $j + 1,
                'title' => $title[$i],
                'description' => $description[$i],
                'responsibilities' => $responsibilities,
                'benefits' => $benefits,
                'requirements' => $requirements,
                'category_id' => $cat,
                'subcategory_id' => $subcat,
                'min_salary' => rand(1, 5) * 1000,
                'max_salary' => rand(5.5, 10) * 1000,
                'employment_type' => $employment_type[$randomEmpType],
                'type' => $type[$randomType],
                'deadline' => Carbon::parse($startDate)->addDays(rand(0, $startDate->diffInDays($endDate))),
                'limit' => $limit[$randomLimit],
                'status' => 'available',
                'address' => $address[$j],
                'country' => $country[$j],
                'city' => $city[$j],
                'created_by' => $j + 17,
            ]);
            if ($j == 11) {
                $j = -1;
            }
            $j++;
        }
    }
}

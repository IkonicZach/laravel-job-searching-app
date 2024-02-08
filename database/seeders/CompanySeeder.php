<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = ['Android', 'Circle', 'Facebook', 'Google', 'Lenovo', 'Linkedin', 'Shree', 'Skype', 'Snapchat', 'Spotify', 'Telegram', 'Whatsup'];
        $email = ['android@gmail.com', 'circle@gmail.com', 'facebook@gmail.com', 'google@gmail.com', 'lenovo@gmail.com', 'linkedin@gmail.com', 'shree@gmail.com', 'skype@gmail.com', 'snapchat@gmail.com', 'spotify@gmail.com', 'telegram@gmail.com', 'whatsapp@gmail.com'];
        $bio = [
            'A subsidiary of Google, is a leading mobile operating system used by billions worldwide. Join our innovative team to contribute to the development of cutting-edge Android technologies that power diverse devices and empower users globally.',
            'A fintech company, is at the forefront of revolutionizing digital currency and blockchain technology. Explore exciting opportunities with us to shape the future of finance and redefine how people exchange value online.',
            'The social media giant, is dedicated to connecting people and building communities. Join us to work on groundbreaking projects that impact billions of users worldwide. Be a part of our mission to make the world more open and connected.',
            "A global technology leader, is constantly pushing boundaries to organize the world's information and make it universally accessible. Join our diverse team to contribute to groundbreaking projects and be a part of shaping the future of technology.",
            "Lenovo is a global leader in technology, committed to delivering smarter technology for all. Join our team if you're passionate about creating devices that empower individuals and businesses worldwide.",
            "LinkedIn is the professional network that's transforming the way professionals connect and build their careers. If you're passionate about helping people achieve their career goals, join us on our mission to create economic opportunity for every member of the global workforce.",
            "Shree is a dynamic company at the forefront of innovation in [industry/niche]. Join us if you're looking for a collaborative and challenging work environment, where your ideas can make a real impact.",
            "Skype, a pioneer in online communication, continues to connect people around the world. Join our team to work on cutting-edge communication technologies and be part of the future of remote collaboration.",
            "Snapchat is more than a social platform; it's a creative space that empowers self-expression. Join our team if you're passionate about building innovative products that redefine the way people communicate and share their stories.",
            "At Spotify, we believe in the power of music and podcasts to bring people together. Join our team if you're excited about shaping the future of audio entertainment and delivering personalized experiences to millions of users.",
            "Telegram is not just a messaging app; it's a platform for secure and private communication. Join our team if you're passionate about building products that prioritize user privacy and redefine the way people connect.",
            "WhatsApp, a part of the Facebook family, is dedicated to providing simple, secure, and reliable messaging for billions of users. Join us if you're excited about shaping the future of communication on a global scale.",
        ];
        $category_id = [11, 5, 1, 11, 7, 9, 3, 8, 11, 2, 1, 3];
        $img = [
            'company/android.png',
            'company/circle-logo.png',
            'company/facebook-logo.png',
            'company/google-logo.png',
            'company/lenovo-logo.png',
            'company/linkedin.png',
            'company/shree-logo.png',
            'company/skype.png',
            'company/snapchat.png',
            'company/spotify.png',
            'company/telegram.png',
            'company/whatsapp.png',
        ];
        $size = [5000, 2500, 6000, 8000, 7000, 2000, 1500, 2000, 1000, 800, 500, 800];
        $founder = ['Andy Rubin', 'Jeremy Allaire & Sean Neville', 'Mark Zuckerberg & Andrew McCollum', 'Larry Page & Sergey Brin', 'Liu Chuanzhi', 'Reid Hoffman & Allen Blue', 'Harry Savaliya', 'Niklas Zennström & Janus Friis', 'Evan Spiegel & Bobby Murphy', 'Daniel Ek & Martin Lorentzon', 'Pavel Durov & Nikolai Durov', 'Brian Acton and Jan Koum'];
        $founded = [2003, 2013, 2004, 1998, 1984, 2002, 2018, 2003, 2011, 2006, 2013, 2009];
        $country = ['United States', 'United States', 'United States', 'United States', 'China', 'United States', 'South Korea', 'United States', 'United States', 'United Kingdom', 'United Kingdom', 'United States'];
        $city = ['New York', 'New York', 'New York', 'New York', 'Beijing', 'New York', 'Seoul', 'New York', 'New York', 'Birmingham', 'Birmingham', 'New York'];
        $address = [
            'Mountain View, California, USA',
            'Boston, Massachusetts, USA',
            'Menlo Park, California, USA',
            'Mountain View, California, USA',
            'Beijing, China',
            'Sunnyvale, California, USA',
            'Sunnyvale, California, USA',
            'Luxembourg City, Luxembourg',
            'Santa Monica, California, USA',
            'Stockholm, Sweden',
            'Dubai, United Arab Emirates',
            'Menlo Park, California, USA',
        ];
        $socials = [
            'www.android,com',
            'www.circle.com',
            'www.facebook.com',
            'www.google.com',
            'www.lenovo.com',
            'www.linkedin.com',
            'www.shreethemes.com',
            'www.skype.com',
            'www.snapchat.com',
            'www.spotify.com',
            'www.telegram.com',
            'www.whatsup.com',
        ];

        for ($i = 0; $i < 12; $i++) {
            Company::create([
                'name' => $name[$i],
                'email' => $email[$i],
                'bio' => $bio[$i],
                'category_id' => $category_id[$i],
                'img' => $img[$i],
                'size' => $size[$i],
                'founder' => $founder[$i],
                'founded' => $founded[$i],
                'country' => $country[$i],
                'city' => $city[$i],
                'address' => $address[$i],
                'socials' => $socials[$i],
                'created_by' => null,
            ]);
        }
    }
}

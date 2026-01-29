<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $courses = [
            [
                'title' => 'Course 1',
                'description' => 'Description 1',
                'image' => 'image1.jpg',
                'status' => 'published',
            ],
            [
                'title' => 'Course 2',
                'description' => 'Description 2',
                'image' => 'image2.jpg',
                'status' => 'published',
            ],
            [
                'title' => 'Course 3',
                'description' => 'Description 3',
                'image' => 'image3.jpg',
                'status' => 'published',
            ],
        ];

    $user->courses()->createMany($courses);
    }
}

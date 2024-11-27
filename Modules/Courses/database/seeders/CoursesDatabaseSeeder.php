<?php

namespace Modules\Courses\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Courses\Models\Course;

class CoursesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            "user_id" => 1,
            "name"=> "first",
        ]);
        Course::create([
            "user_id" => 2,
            "name"=> "second",
        ]);
        Course::create([
            "user_id" => 3,
            "name"=> "third",
        ]);
    }
}

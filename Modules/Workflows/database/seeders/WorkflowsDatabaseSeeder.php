<?php

namespace Modules\Workflows\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Workflows\Models\Workflow;

class WorkflowsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Workflow::create([
            "course_id" => 1,
            "department_id" => 1,
            "name" => "first workflow step",
            "order" => 1,
            "file" => "",
            "comment" => "",
        ]);

        Workflow::create([
            "course_id" => 1,
            "department_id" => 2,
            "name" => "second workflow step",
            "order" => 2,
            "file" => "",
            "comment" => "",
        ]);

        Workflow::create([
            "course_id" => 1,
            "department_id" => 3,
            "name" => "third workflow step",
            "order" => 3,
            "file" => "",
            "comment" => "",
        ]);
    }
}

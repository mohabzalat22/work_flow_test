<?php

namespace Modules\Departments\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Departments\Models\Department;

class DepartmentsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Department::create([
           "user_id"=> 1,
           "name"=> "first",
        ]);

        Department::create([
        "user_id"=> 2,
        "name"=> "second",
        ]);

        Department::create([
            "user_id"=> 3,
            "name"=> "third",
        ]);
    }
}

<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Users\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),  // Make sure to hash the password
            'role' => 0,  // Assuming 0 is the role for admin
        ]);

        // user 1
        User::create([
            'name' => 'user 1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('12345678'),  // Make sure to hash the password
            'role' => 1, 
        ]);

        // user 2
        User::create([
            'name' => 'user 2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('12345678'),  // Make sure to hash the password
            'role' => 1, 
        ]);
    }
}

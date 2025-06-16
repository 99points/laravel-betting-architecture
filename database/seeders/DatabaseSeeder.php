<?php

namespace Database\Seeders;
use App\Models\Role;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles
        Role::insert([
            ['name' => 'admin', 'guard_name' => 'web'],
            ['name' => 'reporting', 'guard_name' => 'web'],
            ['name' => 'operations', 'guard_name' => 'web'],
        ]);


        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a few users with factories
        User::factory()->count(10)->create();

        // Or manually create a specific user
        User::create([
            'email' => 'admin@example.com',
            'role_id' => 1,
            'name' => 'Admin User',
            'phone_nr' => '12345678',
            'employee_id' => 'EMP-000001',
            'password' => bcrypt('password'),
            'company_id' => 111111,
        ]);
    }
}

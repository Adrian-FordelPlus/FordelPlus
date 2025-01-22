<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $role = Role::first(); // Get the first role, assuming roles exist

        User::create([
            'email' => 'admin@example.com',
            'role_id' => $role->role_id,
            'name' => 'Admin User',
            'phone_nr' => '12345678',
            'employee_id' => 'EMP-000001',
            'password' => bcrypt('password'),
            'company_id' => 1,
        ]);
    }
}

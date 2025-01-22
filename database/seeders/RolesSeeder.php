<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        // $role = Role::firstOrCreate(['role_id' => 1], ['role_title' => 'Admin']);
        $roles = [
            ['role_title' => 'Admin'],
            ['role_title' => 'Manager'],
            ['role_title' => 'User'],
        ];
        
        foreach ($roles as $role) {
            Role::firstOrCreate($role);
        }
    }
}

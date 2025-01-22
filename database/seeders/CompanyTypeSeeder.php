<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyType;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Retail', 'description' => 'Retail businesses.'],
            ['name' => 'Manufacturing', 'description' => 'Manufacturing businesses.'],
            ['name' => 'IT Services', 'description' => 'Information Technology services.'],
            ['name' => 'Consulting', 'description' => 'Consulting firms.'],
        ];
    
        foreach ($types as $type) {
            CompanyType::firstOrCreate(['name' => $type['name']], $type);
        }
    }
}

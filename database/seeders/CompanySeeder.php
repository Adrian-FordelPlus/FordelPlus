<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Example Company',
            'address' => '123 Example Street',
            'cvr' => '12345678',
            'b2b' => true,
            'b2c' => false,
            'type_id' => 1, // Assuming type_id 1 exists
            'is_company' => true,
            'branch_code' => 'EX123',
            'slug' => 'example-company',
        ]);

        Company::factory()->count(10)->create();
    }
}

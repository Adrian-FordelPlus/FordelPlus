<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'slug' => 'electronics'],
            ['name' => 'Books', 'slug' => 'books'],
            ['name' => 'Clothing', 'slug' => 'clothing'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

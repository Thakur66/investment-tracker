<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Equity',
                'slug' => 'equity',
                'description' => 'Equity investments',
                'status' => true,
            ],
            [
                'name' => 'Debt',
                'slug' => 'debt',
                'description' => 'Debt investments',
                'status' => true,
            ],
            [
                'name' => 'Gold',
                'slug' => 'gold',
                'description' => 'Gold investments',
                'status' => true,
            ],
            [
                'name' => 'Other',
                'slug' => 'other',
                'description' => 'Other investments',
                'status' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
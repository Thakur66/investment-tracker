<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\InvestmentType;
use Illuminate\Database\Seeder;

class InvestmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $investmentTypes = [
            'equity' => [
                [
                    'name' => 'Mutual Fund',
                    'slug' => 'mutual-fund',
                ],
                [
                    'name' => 'Stock',
                    'slug' => 'stock',
                ],
                [
                    'name' => 'RSU',
                    'slug' => 'rsu',
                ],
                [
                    'name' => 'ETF',
                    'slug' => 'etf',
                ],
            ],

            'debt' => [
                [
                    'name' => 'Fixed Deposit',
                    'slug' => 'fixed-deposit',
                ],
                [
                    'name' => 'Recurring Deposit',
                    'slug' => 'recurring-deposit',
                ],
                [
                    'name' => 'PPF',
                    'slug' => 'ppf',
                ],
                [
                    'name' => 'EPF',
                    'slug' => 'epf',
                ],
                [
                    'name' => 'Bonds',
                    'slug' => 'bonds',
                ],
            ],

            'gold' => [
                [
                    'name' => 'Gold ETF',
                    'slug' => 'gold-etf',
                ],
                [
                    'name' => 'Digital Gold',
                    'slug' => 'digital-gold',
                ],
                [
                    'name' => 'Physical Gold',
                    'slug' => 'physical-gold',
                ],
            ],

            'other' => [
                [
                    'name' => 'Real Estate',
                    'slug' => 'real-estate',
                ],
                [
                    'name' => 'Other',
                    'slug' => 'other',
                ],
            ],
        ];

        foreach ($investmentTypes as $categorySlug => $types) {
            $category = Category::where('slug', $categorySlug)->firstOrFail();

            foreach ($types as $type) {
                InvestmentType::updateOrCreate(
                    ['slug' => $type['slug']],
                    [
                        'category_id' => $category->id,
                        'name' => $type['name'],
                        'slug' => $type['slug'],
                        'status' => true,
                    ]
                );
            }
        }
    }
}
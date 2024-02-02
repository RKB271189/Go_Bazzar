<?php

namespace Database\Seeders;

use App\Models\MainCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MainCategory::insert(
            [
                ['name' => 'Free Ads'],
                ['name' => 'Business Directory'],
                ['name' => 'Services'],
                ['name' => 'News Paper'],
                ['name' => 'Others'],
            ]
        );
    }
}

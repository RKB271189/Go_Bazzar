<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubCategory::insert([
            [
                'category_id' => 1,
                'name' => 'Electronics & Appliances'
            ],
            [
                'category_id' => 1,
                'name' => 'Auto'
            ],
            [
                'category_id' => 1,
                'name' => 'Pets'
            ],
            [
                'category_id' => 1,
                'name' => 'Furniture'
            ],
            [
                'category_id' => 1,
                'name' => 'Books, Sports & Hobbies'
            ],

            [
                'category_id' => 1,
                'name' => 'Kids'
            ],
            [
                'category_id' => 1,
                'name' => 'Services'
            ],
            [
                'category_id' => 1,
                'name' => 'Job Portal'
            ],
            [
                'category_id' => 1,
                'name' => 'Real Estate'
            ],
            [
                'category_id' => 1,
                'name' => 'Travels'
            ],
            [
                'category_id' => 1,
                'name' => 'Roommates'
            ],
            [
                'category_id' => 1,
                'name' => 'Personal & Care'
            ],
            [
                'category_id' => 1,
                'name' => 'Education'
            ],
            [
                'category_id' => 2,
                'name' => 'Travel'
            ],
            [
                'category_id' => 2,
                'name' => 'Business'
            ],
            [
                'category_id' => 2,
                'name' => 'Real Estate'
            ],
            [
                'category_id' => 3,
                'name' => 'Accounting & Tax'
            ],
            [
                'category_id' => 3,
                'name' => 'Driving School'
            ],
            [
                'category_id' => 3,
                'name' => 'Food: Home Made'
            ],
            [
                'category_id' => 3,
                'name' => 'Legal Services'
            ],
            [
                'category_id' => 3,
                'name' => 'Finnancial Planning'
            ],
            [
                'category_id' => 3,
                'name' => 'Decorations Events'
            ],
            [
                'category_id' => 4,
                'name' => 'Hindi'
            ],
            [
                'category_id' => 4,
                'name' => 'Gujarati'
            ],
            [
                'category_id' => 5,
                'name' => 'Entertainment'
            ],
            [
                'category_id' => 5,
                'name' => 'Hotels & Restaurants'
            ],
            [
                'category_id' => 5,
                'name' => 'Education'
            ],
            [
                'category_id' => 5,
                'name' => 'Community'
            ],
            [
                'category_id' => 5,
                'name' => 'Home Maintenance & Services'
            ],
            [
                'category_id' => 5,
                'name' => 'Society & People'
            ],
            [
                'category_id' => 5,
                'name' => 'Health'
            ],
            [
                'category_id' => 5,
                'name' => 'General'
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\SubSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubSubCategory::insert([
            [
                'category_id' => 2,
                'sub_category_id' => 1,
                'name' => 'Taxi/Cab'
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 1,
                'name' => 'Hotels/Motels'
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 1,
                'name' => 'Travel Agents'
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 2,
                'name' => 'Appliances'
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 2,
                'name' => 'Car Dealers'
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 2,
                'name' => 'Garage'
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 2,
                'name' => 'Courier/Shipping'
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 2,
                'name' => 'Printing & Signs'
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 2,
                'name' => 'Insurance Agents'
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 3,
                'name' => 'Apartments'
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 3,
                'name' => 'Furniture'
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 3,
                'name' => 'Builders'
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 3,
                'name' => 'Mortgage Agent'
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 3,
                'name' => 'Realtors'
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 3,
                'name' => 'Pest and Insect Control'
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 3,
                'name' => 'Movers'
            ],
        ]);
    }
}

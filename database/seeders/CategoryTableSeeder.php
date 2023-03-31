<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'category_name' => 'Electrical',
            'category_description' => 'Electrical Tools'
        ],);

        Category::create([
            'category_name' => 'Hand Tools',
            'category_description' => 'Hand Tools'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            [
                'category_name' => 'Electrical',
                'category_description' => 'Electrical Tools'
            ],
            [
                'category_name' => 'Hand Tools',
                'category_description' => 'Hand Tools'
            ],
            // Add more sample data if needed
        ]);
    }
}

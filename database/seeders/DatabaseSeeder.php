<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory()->create([
            'name' => 'mpanabe',
            'email' => 'markedwardpanabe@gmail.com',
            'phone' => '09610708810',
            'location' => 'Bacolod City',
            'password' => ('12345')
        ]);
    }
}

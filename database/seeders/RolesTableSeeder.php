<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert sample data into the 'roles' table
        DB::table('roles')->insert([
            [
                'role_name' => 'Super-Admin',
                'role_description' => 'Role with super admin privileges',
            ],
            [
                'role_name' => 'Admin',
                'role_description' => 'Role with admin privileges',
            ],
            // Add more sample data if needed
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('user_type')->insert([
            ['user_type' => 'Admin'],
            ['user_type' => 'Staff'],
            ['user_type' => 'Client'],
        ]);

        DB::table('users')->insert([
            [
                'role'  => 1,
                'fullname' => 'Adminstrator',
                'email' => 'admin',
                'phone' => 'admin',
                'gender' => 'Nam',
                'password' => bcrypt('admin'),
            ],
            [
                'role'  => 2,
                'fullname' => 'Staff',
                'email' => 'staff',
                'phone' => 'staff',
                'gender' => 'Nam',
                'password' => bcrypt('staff'),
            ],
            [
                'role'  => 3,
                'fullname' => 'Phạm Lê',
                'email' => 'phamle21@gmail.com',
                'phone' => '0941649826',
                'gender' => 'Nam',
                'password' => bcrypt('phamle21'),
            ],
        ]);

        \App\Models\Product::factory(10)->create();

    }
}

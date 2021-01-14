<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Muhammad Rizal',
                'username' => 'rizalpahlevi',
                'email' => 'rizalpahlevi@gmail.com',
                'password' => bcrypt('123123123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pahlevi',
                'username' => 'pahlevi',
                'email' => 'pahlevi@gmail.com',
                'password' => bcrypt('123123123'),
                'role' => 'franchise',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        User::insert($data);
    }
}

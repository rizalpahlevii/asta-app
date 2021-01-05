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
                'password' => bcrypt('123123123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Pahlevi',
                'username' => 'pahlevi',
                'password' => bcrypt('123123123'),
                'role' => 'franchise',
            ]
        ];
        User::insert($data);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Franchise;
use Illuminate\Database\Seeder;

class FranchiseSeeder extends Seeder
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
                'franchise_type_id' => 1,
                'name' => 'INDOMARET KELET',
                'owner_name' => 'Pahlevi',
                'address' => 'KELET KELING',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        Franchise::insert($data);
    }
}

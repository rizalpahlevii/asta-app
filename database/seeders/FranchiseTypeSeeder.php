<?php

namespace Database\Seeders;

use App\Models\FranchiseType;
use Illuminate\Database\Seeder;

class FranchiseTypeSeeder extends Seeder
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
                'name' => 'INDOMARET',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        FranchiseType::insert($data);
    }
}

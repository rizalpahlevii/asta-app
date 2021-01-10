<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                'name' => 'BOBA',
                'franchise_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        Category::insert($data);
    }
}

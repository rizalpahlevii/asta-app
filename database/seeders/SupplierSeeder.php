<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
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
                'name' => 'MITRA KOMPUTER',
                'address' => 'MOJO CLUWAK PATI',
                'phone' => '01982399787',
                'owner' => 'WIWIT',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        Supplier::insert($data);
    }
}

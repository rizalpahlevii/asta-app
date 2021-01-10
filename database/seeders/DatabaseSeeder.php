<?php

namespace Database\Seeders;

use App\Models\FranchiseSupplier;
use App\Models\FranchiseType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(FranchiseTypeSeeder::class);
        $this->call(FranchiseSeeder::class);
        $this->call(CategorySeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}

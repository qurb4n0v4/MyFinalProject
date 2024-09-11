<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CompanySeeder::class,
            CategorySeeder::class,
            JobSeeder::class,
            BlogSeeder::class,
            AdminSeeder::class,
        ]);
    }
}

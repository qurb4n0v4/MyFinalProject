<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::create([
            'name' => 'Rusik',
            'email' => 'ra@mail.ru',
            'password' => Hash::make('rusikays'),
            'website' => 'https://techinnovations.com',
            'address' => '123 Tech Lane, Silicon Valley',
            'description' => 'Leading tech solutions provider.',
            'logo' => 'default-logo.png',
            'phone' => '123-456-7890',
            'status' => 'active',
            'industry' => 'Technology',
        ]);
    }
}

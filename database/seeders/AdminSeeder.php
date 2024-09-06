<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'Qurb4n0v4',
            'email' => 'ayserqurbanovaa@gmail.com',
            'password' => Hash::make('12344321'),
        ]);
    }
}

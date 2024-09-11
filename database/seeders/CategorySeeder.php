<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Technology', 'description' => 'Tech related jobs', 'slug' => 'technology'],
            ['name' => 'Healthcare', 'description' => 'Jobs in the healthcare sector', 'slug' => 'healthcare'],
            ['name' => 'Finance', 'description' => 'Finance and accounting jobs', 'slug' => 'finance'],
            ['name' => 'Education', 'description' => 'Teaching and educational roles', 'slug' => 'education'],
            ['name' => 'Marketing', 'description' => 'Marketing and sales jobs', 'slug' => 'marketing'],
            ['name' => 'Engineering', 'description' => 'Engineering roles', 'slug' => 'engineering'],
            ['name' => 'Human Resources', 'description' => 'HR and recruitment jobs', 'slug' => 'human-resources'],
            ['name' => 'Customer Service', 'description' => 'Customer support roles', 'slug' => 'customer-service'],
            ['name' => 'Art & Design', 'description' => 'Creative and design jobs', 'slug' => 'art-and-design'],
            ['name' => 'Legal', 'description' => 'Legal and compliance jobs', 'slug' => 'legal'],
            ['name' => 'Manufacturing', 'description' => 'Jobs in manufacturing and production', 'slug' => 'manufacturing'],
            ['name' => 'Construction', 'description' => 'Construction and trades jobs', 'slug' => 'construction'],
            ['name' => 'Logistics', 'description' => 'Logistics and supply chain roles', 'slug' => 'logistics'],
            ['name' => 'Real Estate', 'description' => 'Real estate and property management jobs', 'slug' => 'real-estate'],
            ['name' => 'Travel & Hospitality', 'description' => 'Travel and hospitality roles', 'slug' => 'travel-hospitality'],
        ];

        DB::table('categories')->insert($categories);
    }
}

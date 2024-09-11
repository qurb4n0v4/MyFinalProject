<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 9) as $index) {
            DB::table('blogs')->insert([
                'title' => $faker->sentence,
                'content' => $faker->paragraphs(3, true),
                'slug' => $faker->slug,
                'author_id' => 1,
                'category_id' => $faker->numberBetween(1, 5), // Varsayalım ki 5 tane kategori var
                'featured_image' => $faker->imageUrl,
                'published_at' => $faker->optional()->dateTimeBetween('-1 month', 'now'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

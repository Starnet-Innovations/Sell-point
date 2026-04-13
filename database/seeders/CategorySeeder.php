<?php
// database/seeders/CategorySeeder.php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        // Get the keys from your schema (e.g., 'cars', 'apartments', 'phones')
        $types = array_keys(Listing::getSchemas());

        foreach ($types as $type) {
            Category::updateOrCreate(
                ['title' => ucwords(str_replace('_', ' ', $type))],
                ['image' => $faker->imageUrl(400, 400, 'technics', true, $type)]
            );
        }
    }
}
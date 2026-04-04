<?php
// database/seeders/ListingsTableSeeder.php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ListingsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $schemas = Listing::getSchemas();

        foreach ($schemas as $type => $schema) {
            // Create 10 listings for each type
            for ($i = 0; $i < 10; $i++) {
                $attributes = [];

                foreach ($schema as $fieldName => $fieldConfig) {
                    $attributes[$fieldName] = $this->generateFakeValue($faker, $fieldConfig);
                }

                Listing::create([
                    'listing_type' => $type,
                    'title' => $this->generateTitle($faker, $type, $attributes),
                    'description' => $faker->paragraphs(3, true),
                    'price' => $faker->randomFloat(2, 10000, 10000000),                   
                    'attributes' => $attributes,
                    'address' => $faker->streetAddress,
                    'city' => $faker->city,
                    'state' => $faker->randomElement(['Lagos', 'Abuja', 'Rivers', 'Kano', 'Ogun']),                  
                    'image' => $faker->imageUrl(800, 600, 'business', true),                   
                    'status' => $faker->randomElement(['active', 'sold', 'pending']),               
                    'is_verified' => $faker->boolean(70),
                    'user_id' => 1, // Assuming user with ID 1 exists
                    'views' => $faker->numberBetween(0, 1000)
                ]);
            }
        }
    }

    private function generateFakeValue($faker, $fieldConfig)
    {
        switch ($fieldConfig['type']) {
            case 'text':
                return $faker->word;
            case 'number':
                return $faker->numberBetween(1, 100);
            case 'select':
                $options = $fieldConfig['options'] ?? [];
                return $faker->randomElement($options);
            case 'date':
                return $faker->date('Y-m-d');
            default:
                return $faker->word;
        }
    }



    private function generateTitle($faker, $type, $attributes)
    {
        $title = ucwords(str_replace('_', ' ', $type));

        if (isset($attributes['make']) && isset($attributes['model'])) {            
            $year = isset($attributes['year']) ? $attributes['year'] : $faker->year;
            $title = "{$attributes['make']} {$attributes['model']} - {$year}";
        } elseif (isset($attributes['property_type'])) {
            $title = "Beautiful {$attributes['property_type']} for Sale in {$faker->city}";
        } elseif (isset($attributes['brand']) && isset($attributes['model'])) {
            $title = "{$attributes['brand']} {$attributes['model']} - Like New";
        }

        return $title;
    }
}

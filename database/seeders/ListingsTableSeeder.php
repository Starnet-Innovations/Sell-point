<?php

namespace Database\Seeders;

use App\Models\ListingSchema;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListingsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();       
     
        
        // Get all schemas
        $schemas = ListingSchema::getSchemas();
        
        if (empty($schemas)) {
            $this->command->error('No schemas found!');
            return;
        }

        // Fetch all cities 
        $cities = DB::table('cities')->get();
        
        if ($cities->isEmpty()) {
            $this->command->error('No cities found! Please run StateSeeder and CitySeeder first.');
            return;
        }
        
        foreach ($schemas as $type => $schema) {
            $categoryTitle = ucwords(str_replace('_', ' ', $type));
            $category = DB::table('categories')->where('title', $categoryTitle)->first();
            
            // Create 5 listings per type
            for ($i = 0; $i < 5; $i++) {
                $attributes = [];
                
                foreach ($schema as $fieldName => $fieldConfig) {
                    $attributes[$fieldName] = $this->generateFakeValue($faker, $fieldConfig);
                }
                
                // Generate title
                $title = $this->generateTitle($faker, $type, $attributes);

                // Pick a random city for this specific listing
                $randomCity = $cities->random();
                
                // Prepare data array with EXPLICIT title field
                $data = [
                    'category_id' => $category ? $category->id : null,
                    'listing_type' => $type,
                    'title' => $title, // TITLE IS EXPLICITLY SET
                    'description' => $faker->paragraphs(3, true),
                    'price' => $faker->randomFloat(2, 10000, 10000000),
                    'attributes' => json_encode($attributes), // Explicit JSON encoding
                    'condition' => $faker->randomElement(['new', 'used']),
                    'address' => $faker->streetAddress,
                    'city_id' => $randomCity->id,
                    'state_id' => $randomCity->state_id,
                    'image' => $faker->imageUrl(800, 600, 'business', true),
                    'status' => $faker->randomElement(['active', 'sold', 'pending']),
                    'is_verified' => $faker->boolean(70) ? 1 : 0,
                    'user_id' => 1,
                    'views' => $faker->numberBetween(0, 1000),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                
                // Debug: Show what we're inserting
                $this->command->info("Inserting: {$data['title']} (Type: {$type})");
                
                // Insert directly using DB facade (bypasses all Eloquent issues)
                DB::table('listings')->insert($data);
            }
        }
        
        $this->command->info('✓ Listings seeded successfully!');
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
                return !empty($options) ? $faker->randomElement($options) : $faker->word;
            case 'date':
                return $faker->date('Y-m-d');
            default:
                return $faker->word;
        }
    }
    
    private function generateTitle($faker, $type, $attributes)
    {
        // Handle books_magazines specifically
        if ($type === 'books_magazines') {
            $bookTitle = isset($attributes['title']) ? $attributes['title'] : $faker->sentence(3);
            $author = isset($attributes['author']) ? $attributes['author'] : $faker->name;
            return "Book: {$bookTitle} by {$author}";
        }
        
        // Handle cars
        if (isset($attributes['make']) && isset($attributes['model'])) {
            $year = isset($attributes['year']) ? $attributes['year'] : $faker->year;
            return "{$attributes['make']} {$attributes['model']} - {$year}";
        }
        
        // Handle properties
        if (isset($attributes['property_type'])) {
            return "Beautiful {$attributes['property_type']} in {$faker->city}";
        }
        
        // Handle phones
        if (isset($attributes['brand']) && isset($attributes['model'])) {
            $storage = isset($attributes['storage']) ? " {$attributes['storage']}" : '';
            return "{$attributes['brand']} {$attributes['model']}{$storage} - Like New";
        }
        
        // Handle laptops
        if (isset($attributes['processor'])) {
            return "High Performance {$attributes['processor']} Laptop";
        }
        
        // Default title
        return ucwords(str_replace('_', ' ', $type)) . ' - ' . $faker->words(3, true);
    }
}
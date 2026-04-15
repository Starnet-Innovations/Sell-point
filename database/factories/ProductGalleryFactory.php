<?php

namespace Database\Factories;

use App\Models\Listing;
use App\Models\ProductGallery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductGallery>
 */
class ProductGalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        // Generates a placeholder image URL
        'image' => 'products/' . $this->faker->image('public/storage/products', 640, 480, null, false),
        'listing_id' => Listing::factory(), // Connects to a listing
    ];
    }
}

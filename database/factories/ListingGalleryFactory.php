<?php

namespace Database\Factories;

use App\Models\ListingGallery;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListingGalleryFactory extends Factory
{
    public function definition(): array
    {
        // Use placeholder images from the web - no local storage needed
        $imageId = $this->faker->numberBetween(1, 1000);
        
        return [
            'image' => "https://picsum.photos/id/{$imageId}/640/480",
        ];
    }
}
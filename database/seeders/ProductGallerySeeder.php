<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\ProductGallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all existing listings
        $listings = Listing::all();

        // Add 5 gallery images to every listing
        $listings->each(function ($listing) {
            ProductGallery::factory()->count(5)->create([
                'listing_id' => $listing->id,
            ]);
        });
    }
}

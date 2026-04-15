<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\ListingGallery;
use Illuminate\Database\Seeder;

class ListingGallerySeeder extends Seeder
{
    public function run(): void
    {
        $listings = Listing::all();

        if ($listings->isEmpty()) {
            $this->command->error("No listings found! Please run ListingsTableSeeder first.");
            return;
        }

        // Add 5 gallery images to every listing
        $listings->each(function ($listing) {
            ListingGallery::factory()->count(5)->create([
                'listing_id' => $listing->id,
            ]);
        });
    }
}
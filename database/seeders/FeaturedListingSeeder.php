<?php

namespace Database\Seeders;

use App\Models\FeaturedListing;
use App\Models\Listing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeaturedListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Grab some existing listings and make them featured
        $listings = Listing::limit(5)->get();

        foreach ($listings as $listing) {
            FeaturedListing::factory()->create([
                'listing_id' => $listing->id,
            ]);
        }
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('featured_listings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('listing_id')->unique()->constrained()->onDelete('cascade');
        $table->boolean('status')->default(true);
        $table->integer('position')->default(0); // Useful for ordering
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('featured_listings');
    }
};

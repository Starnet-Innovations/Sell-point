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
        Schema::create('listing_schemas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // 'cars', 'phones_tablets', etc.
            $table->json('schema'); // Stores the entire schema array
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_schemas');
    }
};

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
        Schema::table('listings', function (Blueprint $table) {
           
            $table->dropColumn(['city', 'state']);

            $table->foreignId('state_id')->after('address')->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->after('state_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {         
            $table->dropForeign(['state_id']);
            $table->dropForeign(['city_id']);
            $table->dropColumn(['state_id', 'city_id']);

           
            $table->string('city')->nullable();
            $table->string('state')->nullable();
        });
    }
};
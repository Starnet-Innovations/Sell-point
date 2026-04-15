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
        Schema::create('kycs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');

           
            $table->enum('id_type', ['NIN', 'Passport', 'Voters_Card', 'Drivers_License']);
            $table->string('id_number');
            $table->string('full_name');
            $table->date('dob');

            // Image Paths
            $table->string('id_image_front');
            $table->string('id_image_back')->nullable(); // Optional for NIN slips
            $table->string('selfie_image');

            // Verification Status
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->text('rejection_reason')->nullable();

            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kycs');
    }
};

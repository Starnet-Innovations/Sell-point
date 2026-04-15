<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            
            // Core fields
            $table->string('listing_type'); 
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price', 12, 2);     
            $table->string('condition')->nullable();  
            
            // Dynamic fields stored as JSON
            $table->json('attributes');
            
            // Location fields
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();         
            $table->integer('views')->default(0); 
            
            // Media
            $table->string('image')->nullable();        
            
            // Status
            $table->enum('status', ['active', 'sold', 'rented', 'pending', 'expired'])->default('active');           
            $table->boolean('is_verified')->default(false);
            
            // User relation
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->constrained();                 
            
            // Timestamps
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes for performance
            $table->index('listing_type');
            $table->index('status');
            $table->index('price');
            $table->index('user_id');
            $table->index('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('listings');
    }
};
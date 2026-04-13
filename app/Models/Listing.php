<?php

namespace App\Models;

use App\Traits\HasDynamicAttributes;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


#[Fillable(['listing_type', 'title', 'description', 'price', 'attributes', 'address', 'city', 'state', 'image', 'status', 'is_verified', 'user_id', 'category_id', 'views'])]

class Listing extends Model
{
    use SoftDeletes;
    use HasDynamicAttributes;

    protected $casts = [
        'attributes' => 'array',
        'is_verified' => 'boolean',
        'price' => 'decimal:2',
        'views' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public static function getSchemas()
    {
        // Fetch all schemas from the listing_schemas table
        $schemas = ListingSchema::all();
        $result = [];
        
        foreach ($schemas as $schema) {
            $result[$schema->name] = $schema->schema;
        }
        
        return $result;
    }


    
    // Get schema for a specific listing type
   public static function getSchemaForType($listingType)
    {
        $schema = ListingSchema::where('name', $listingType)->first();
        return $schema ? $schema->schema : [];
    }

    // Get required fields for a listing type
    public static function getRequiredFields(string $type): array
    {
        $schema = self::getSchemaForType($type);
        return array_keys(array_filter($schema, fn($field) => $field['required'] ?? false));
    }

    // Accessor for specific attribute
    public function getAttributeValue($key)
    {
        // 1. Get the standard value (handles title, price, and the JSON 'attributes' column itself)
        $value = parent::getAttributeValue($key);

        // 2. If Laravel found nothing (the column doesn't exist in the DB)...
        if (is_null($value)) {
            // 3. Look inside our JSON column (which Laravel named 'attributes' in your DB)
            $jsonAttributes = parent::getAttributeValue('attributes'); // Gets the decoded JSON array

            if (is_array($jsonAttributes) && array_key_exists($key, $jsonAttributes)) {
                return $jsonAttributes[$key];
            }
        }

        return $value;
    }


    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

      public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Scopes
    public function scopeOfType($query, string $type)
    {
        return $query->where('listing_type', $type);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeInPriceRange($query, $min, $max)
    {
        return $query->whereBetween('price', [$min, $max]);
    }
}


















// Get all schemas from database
//     public static function getSchemas(): array
//     {
//         $schemas = ListingSchema::all();
//         $result = [];
        
//         foreach ($schemas as $schema) {
//             $result[$schema->name] = $schema->schema;
//         }
        
//         return $result;
//     }
    
//     // Get schema for a specific listing type
//     public static function getSchemaForType(string $type): array
//     {
//         return self::getSchemas()[$type] ?? [];
//     }
    
//     // Get required fields for a listing type
//     public static function getRequiredFields(string $type): array
//     {
//         $schema = self::getSchemaForType($type);
//         return array_keys(array_filter($schema, fn($field) => $field['required'] ?? false));
//     }
    
//     // Accessor for specific attribute (already in trait, but kept for compatibility)
//     public function getAttributeValue($key)
//     {
//         $value = parent::getAttributeValue($key);
        
//         if (is_null($value)) {
//             $jsonAttributes = parent::getAttributeValue('attributes');
            
//             if (is_array($jsonAttributes) && array_key_exists($key, $jsonAttributes)) {
//                 return $jsonAttributes[$key];
//             }
//         }
        
//         return $value;
//     }
    
//     // Relationships
//     public function user()
//     {
//         return $this->belongsTo(User::class);
//     }
    
//     // Scopes
//     public function scopeActive($query)
//     {
//         return $query->where('status', 'active');
//     }
    
//     public function scopeOfType($query, $type)
//     {
//         return $query->where('listing_type', $type);
//     }
    
//     public function scopeVerified($query)
//     {
//         return $query->where('is_verified', true);
//     }
// }
// Seeder for Dynamic Schemas
// php
// <?php

<?php

namespace App\Services;

use App\Models\Listing;
use App\Models\ListingSchema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ListingService
{
    /**
     * Create a new listing schema (product type)
     */
    public function createSchema(string $name, array $schema): ListingSchema
    {
        // Validate schema structure
        $this->validateSchemaStructure($schema);
        
        return ListingSchema::create([
            'name' => Str::slug($name, '_'),
            'schema' => $schema
        ]);
    }
    
    /**
     * Update existing schema
     */
    public function updateSchema(ListingSchema $listingSchema, array $schema): ListingSchema
    {
        $this->validateSchemaStructure($schema);
        
        $listingSchema->update(['schema' => $schema]);
        
        return $listingSchema;
    }
    
    /**
     * Validate schema structure
     */
    private function validateSchemaStructure(array $schema): void
    {
        foreach ($schema as $fieldName => $config) {
            if (!isset($config['type']) || !in_array($config['type'], ['text', 'number', 'select', 'date', 'textarea', 'boolean'])) {
                throw new \InvalidArgumentException("Field '{$fieldName}' has invalid type");
            }
            
            if (!isset($config['label'])) {
                throw new \InvalidArgumentException("Field '{$fieldName}' is missing label");
            }
            
            if ($config['type'] === 'select' && !isset($config['options'])) {
                throw new \InvalidArgumentException("Select field '{$fieldName}' must have options");
            }
        }
    }
    
    /**
     * Get form fields for a listing type
     */
    public function getFormFields(string $type): array
    {
        $schema = Listing::getSchemaForType($type);
        $fields = [];
        
        foreach ($schema as $name => $config) {
            $fields[] = [
                'name' => $name,
                'type' => $config['type'],
                'label' => $config['label'],
                'required' => $config['required'] ?? false,
                'options' => $config['options'] ?? [],
                'placeholder' => $config['placeholder'] ?? '',
                'default' => $config['default'] ?? null,
            ];
        }
        
        return $fields;
    }
    
    /**
     * Create a new listing
     */
    public function createListing(array $data): Listing
    {
        $listingType = $data['listing_type'];
        $schema = Listing::getSchemaForType($listingType);
        
        // Extract dynamic attributes
        $attributes = [];
        foreach (array_keys($schema) as $field) {
            if (isset($data[$field])) {
                $attributes[$field] = $data[$field];
            }
        }
        
        // Generate title if not provided
        if (empty($data['title'])) {
            $data['title'] = $this->generateTitle($listingType, $attributes);
        }
        
        $listing = Listing::create([
            'listing_type' => $listingType,
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'price' => $data['price'],
            'attributes' => $attributes,
            'address' => $data['address'] ?? null,
            'city' => $data['city'] ?? null,
            'state' => $data['state'] ?? null,
            'image' => $data['image'] ?? null,
            'status' => $data['status'] ?? 'active',
            'is_verified' => $data['is_verified'] ?? false,
            'user_id' => $data['user_id'],
        ]);
        
        return $listing;
    }
    
    /**
     * Update a listing
     */
    public function updateListing(Listing $listing, array $data): Listing
    {
        $schema = $listing->getSchema();
        
        // Update dynamic attributes
        $attributes = $listing->attributes ?? [];
        foreach (array_keys($schema) as $field) {
            if (isset($data[$field])) {
                $attributes[$field] = $data[$field];
            }
        }
        
        $updateData = [
            'attributes' => $attributes,
            'title' => $data['title'] ?? $listing->title,
            'description' => $data['description'] ?? $listing->description,
            'price' => $data['price'] ?? $listing->price,
            'address' => $data['address'] ?? $listing->address,
            'city' => $data['city'] ?? $listing->city,
            'state' => $data['state'] ?? $listing->state,
            'status' => $data['status'] ?? $listing->status,
        ];
        
        $listing->update($updateData);
        
        return $listing;
    }
    
    /**
     * Search listings with filters
     */
    public function searchListings(array $filters)
    {
        $query = Listing::query()->where('status', 'active');
        
        if (isset($filters['listing_type'])) {
            $query->where('listing_type', $filters['listing_type']);
        }
        
        if (isset($filters['min_price'])) {
            $query->where('price', '>=', $filters['min_price']);
        }
        
        if (isset($filters['max_price'])) {
            $query->where('price', '<=', $filters['max_price']);
        }
        
        if (isset($filters['city'])) {
            $query->where('city', $filters['city']);
        }
        
        if (isset($filters['state'])) {
            $query->where('state', $filters['state']);
        }
        
        // Search within JSON attributes
        foreach ($filters as $key => $value) {
            if (!in_array($key, ['listing_type', 'min_price', 'max_price', 'city', 'state', 'page', 'per_page'])) {
                $query->whereJsonContains("attributes->{$key}", $value);
            }
        }
        
        $perPage = $filters['per_page'] ?? 20;
        return $query->paginate($perPage);
    }
    
    /**
     * Generate title based on attributes
     */
    private function generateTitle(string $type, array $attributes): string
    {
        $title = ucwords(str_replace('_', ' ', $type));
        
        if (isset($attributes['make']) && isset($attributes['model'])) {
            $year = $attributes['year'] ?? date('Y');
            $title = "{$attributes['make']} {$attributes['model']} - {$year}";
        } elseif (isset($attributes['property_type'])) {
            $title = "Beautiful {$attributes['property_type']} for Sale";
        } elseif (isset($attributes['brand']) && isset($attributes['model'])) {
            $title = "{$attributes['brand']} {$attributes['model']} - Like New";
        } elseif (isset($attributes['job_title']) && isset($attributes['company_name'])) {
            $title = "{$attributes['job_title']} at {$attributes['company_name']}";
        }
        
        return $title;
    }
    
    /**
     * Get statistics for a listing type
     */
    public function getStatistics(string $type = null): array
    {
        $query = Listing::query();
        
        if ($type) {
            $query->where('listing_type', $type);
        }
        
        return [
            'total' => $query->count(),
            'active' => (clone $query)->where('status', 'active')->count(),
            'sold' => (clone $query)->where('status', 'sold')->count(),
            'pending' => (clone $query)->where('status', 'pending')->count(),
            'average_price' => (clone $query)->avg('price'),
            'total_views' => (clone $query)->sum('views'),
        ];
    }
}
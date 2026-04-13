<?php
// app/Services/ListingService.php

namespace App\Services;

use App\Models\Listing;

class ListingService
{
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
    
    public function searchListings(array $filters)
    {
        $query = Listing::query()->active();
        
        if (isset($filters['listing_type'])) {
            $query->ofType($filters['listing_type']);
        }
        
        if (isset($filters['min_price'])) {
            $query->where('price', '>=', $filters['min_price']);
        }
        
        if (isset($filters['max_price'])) {
            $query->where('price', '<=', $filters['max_price']);
        }
        
        // Search within JSON attributes (MySQL)
        foreach ($filters as $key => $value) {
            if (!in_array($key, ['listing_type', 'min_price', 'max_price', 'address', 'city', 'state'])) {
                $query->whereJsonContains("attributes->{$key}", $value);
            }
        }
        
        return $query->paginate(20);
    }
}
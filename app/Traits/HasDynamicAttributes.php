<?php

namespace App\Traits;

use App\Models\ListingSchema;

trait HasDynamicAttributes
{
    public function setAttribute($key, $value)
    {
        $schema = $this->getSchema();
        
        if (!empty($schema) && array_key_exists($key, $schema)) {
            $attributes = $this->attributes['attributes'] ?? [];
            $attributes[$key] = $value;
            $this->attributes['attributes'] = json_encode($attributes);
            return $this;
        }
        
        return parent::setAttribute($key, $value);
    }
    
    public function getAttribute($key)
    {
        $schema = $this->getSchema();
        
        if (!empty($schema) && array_key_exists($key, $schema)) {
            $attributes = $this->getAttributeValue('attributes');
            $decodedAttributes = is_string($attributes) ? json_decode($attributes, true) : $attributes;
            return $decodedAttributes[$key] ?? null;
        }
        
        return parent::getAttribute($key);
    }
    
    public function getSchema()
    {
        // Check attributes array first (for new models not yet saved)
        $listingType = null;
        
        // Try to get from attributes array (most reliable for new records)
        if (isset($this->attributes['listing_type'])) {
            $listingType = $this->attributes['listing_type'];
        }
        // Then try property access
        elseif (property_exists($this, 'listing_type') && isset($this->listing_type)) {
            $listingType = $this->listing_type;
        }
        // Then try the relation if it exists
        elseif (isset($this->relations['listingSchema'])) {
            $listingType = $this->relations['listingSchema']->name;
        }
        
        if (!$listingType) {
            return [];
        }
        
        // Fetch the schema from the database
        $schemaModel = ListingSchema::where('name', $listingType)->first();
        return $schemaModel ? $schemaModel->schema : [];
    }
    
    public function validateAttributes()
    {
        $schema = $this->getSchema();
        $errors = [];
        
        if (empty($schema)) {
            return $errors;
        }
        
        foreach ($schema as $field => $rules) {
            // Check required fields
            if (($rules['required'] ?? false) && empty($this->$field)) {
                $errors[$field] = "The {$rules['label']} field is required";
            }
        }
        
        return $errors;
    }
}
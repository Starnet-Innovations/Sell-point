<?php

namespace App\Traits;

trait HasDynamicAttributes
{
    public function setAttribute($key, $value)
    {
        $schema = $this->getSchema();
        
        if (array_key_exists($key, $schema)) {
            $attributes = $this->attributes['attributes'] ?? [];
            $attributes[$key] = $value;
            $this->attributes['attributes'] = $attributes;
            return $this;
        }
        
        return parent::setAttribute($key, $value);
    }
    
    public function getAttribute($key)
    {
        if (array_key_exists($key, $this->getSchema())) {
            $attributes = $this->getAttributeValue('attributes') ?? [];
            return $attributes[$key] ?? null;
        }
        
        return parent::getAttribute($key);
    }
    
    public function getSchema()
    {
        return static::getSchemaForType($this->listing_type);
    }
    
    public function validateAttributes()
    {
        $schema = $this->getSchema();
        $errors = [];
        
        foreach ($schema as $field => $rules) {
            if (($rules['required'] ?? false) && empty($this->$field)) {
                $errors[$field] = "The {$rules['label']} field is required";
            }
        }
        
        return $errors;
    }
}
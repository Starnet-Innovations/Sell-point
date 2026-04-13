<?php

namespace App\Traits;

use App\Models\ListingSchema;

trait HasDynamicSchemaAttributes
{
    /**
     * Override setAttribute to handle dynamic attributes
     */
    public function setAttribute($key, $value)
    {
        
        $name = $this->attributes['name'] ?? null;

        
        $schema = ($name && is_string($name)) ? ListingSchema::getSchema($name) : null;

        if (is_array($schema) && array_key_exists($key, $schema)) {
            $attributes = $this->attributes['attributes'] ?? [];
            $attributes[$key] = $value;
            $this->attributes['attributes'] = json_encode($attributes);
            return $this;
        }

        return parent::setAttribute($key, $value);
    }

    /**
     * Override getAttribute to handle dynamic attributes
     */
    public function getAttribute($key)
    {
        $name = $this->attributes['name'] ?? null;

        
        $schema = ($name && is_string($name)) ? ListingSchema::getSchema($name) : null;
        
        if (array_key_exists($key, $this->getSchema())) {
            $attributes = $this->getAttributeValue('attributes');
            return is_array($attributes) ? ($attributes[$key] ?? null) : null;
        }

        return parent::getAttribute($key);
    }

    /**
     * Get the schema for this listing type
     */
    public function getSchema(): array
    {
        return static::getSchemaForType($this->listing_type);
    }

    /**
     * Validate attributes against schema
     */
    public function validateAttributes(): array
    {
        $schema = $this->getSchema();
        $errors = [];

        foreach ($schema as $field => $rules) {
            $value = $this->getAttribute($field);

            // Check required fields
            if (($rules['required'] ?? false) && empty($value)) {
                $errors[$field] = "The {$rules['label']} field is required";
            }

            // Type validation
            if (!empty($value)) {
                switch ($rules['type']) {
                    case 'number':
                        if (!is_numeric($value)) {
                            $errors[$field] = "The {$rules['label']} must be a number";
                        }
                        break;
                    case 'date':
                        if (!strtotime($value)) {
                            $errors[$field] = "The {$rules['label']} must be a valid date";
                        }
                        break;
                    case 'select':
                        if (isset($rules['options']) && !in_array($value, $rules['options'])) {
                            $errors[$field] = "The {$rules['label']} value is invalid";
                        }
                        break;
                }
            }
        }

        return $errors;
    }

    /**
     * Get all attribute values as array
     */
    public function getAttributesArray(): array
    {
        $schema = $this->getSchema();
        $result = [];

        foreach (array_keys($schema) as $key) {
            $result[$key] = $this->getAttribute($key);
        }

        return $result;
    }

    /**
     * Check if attribute exists in schema
     */
    public function hasAttribute($key): bool
    {
        return array_key_exists($key, $this->getSchema());
    }
}

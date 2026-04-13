<?php

namespace App\Models;

// use App\Traits\HasDynamicSchemaAttributes;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'schema'])]
class ListingSchema extends Model
{


    // use HasDynamicSchemaAttributes;
    protected $casts = [
        'schema' => 'array'
    ];

    // Get all schemas as array
    public static function getSchemas(): array
    {
        $schemas = self::all();
        $result = [];
        
        foreach ($schemas as $schema) {
            $result[$schema->name] = $schema->schema;
        }

        // This replaces your entire foreach loop
        // $result = ListingSchema::pluck('schema', 'name')->toArray();
        
        return $result;
    }

    // Get a single schema by name
    public static function getSchema(string $name): ?array
    {
        $schema = self::where('name', $name)->first();
        return $schema ? $schema->schema : null;
    }
}

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
        
        return self::pluck('schema', 'name')->toArray();

    }

    // Get a single schema by name
    public static function getSchema(string $name): ?array
    {
        $schema = self::where('name', $name)->value('schema');
        return $schema ? $schema : null;
    }
}

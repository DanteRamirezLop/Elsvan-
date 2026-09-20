<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RealEstateProject extends Model
{
     protected $fillable = [
        'name',
        'slug',
        'location',
        'district',
        'description',
        'price_from',
        'area_from',
        'main_image',
        'status',
        'file',
        'tag',
        'rooms_from',
        'bathrooms_from',
        'delivery_date',
    ];


    public function scopeOrderedByTag(Builder $query): Builder
    {
        return $query
            ->orderByRaw("CASE tag
                WHEN 'en_construccion' THEN 0
                WHEN 'proxima_entrega' THEN 1
                WHEN 'lanzamiento' THEN 2
                WHEN 'estreno' THEN 3
                WHEN 'vendido' THEN 4
                ELSE 5 END")
            ->orderBy('created_at', 'desc');
    }

    public function getTagLabelAttribute(): ?string
    {
        return match ($this->tag) {
            'proxima_entrega' => 'Próxima entrega',
            'en_construccion' => 'En construcción',
            default => $this->tag,
        };
    }

    public function getRouteKeyName()
    {
       return 'slug';
    }

    public function environments(): HasMany
    {
        return $this->hasMany(ProjectEnvironment::class);
    }

    public function blueprints(): HasMany
    {
        return $this->hasMany(ProjectBlueprints::class);
    }
}

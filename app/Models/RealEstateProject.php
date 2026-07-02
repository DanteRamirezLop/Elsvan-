<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RealEstateProject extends Model
{
     protected $fillable = [
        'name',
        'slug',
        'location',
        'description',
        'price_from',
        'area_from',
        'main_image',
        'status',
        'tag',
        'rooms_from',
        'bathrooms_from',
        'delivery_date',
    ];

    // public function environments(): HasMany
    // {
    //     return $this->hasMany(ProjectEnvironment::class)
    //         ->orderBy('sort_order');
    // }

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

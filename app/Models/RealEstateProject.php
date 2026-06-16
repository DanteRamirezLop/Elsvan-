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
    ];

    // public function environments(): HasMany
    // {
    //     return $this->hasMany(ProjectEnvironment::class)
    //         ->orderBy('sort_order');
    // }

    public function environments(): HasMany
    {
        return $this->hasMany(ProjectEnvironment::class);
    }
}

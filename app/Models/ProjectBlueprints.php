<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectBlueprints extends Model
{
    protected $fillable = [
        'real_estate_project_id',
        'name',
        'description',
        'image',
        'bedrooms',
        'bathrooms',
        'garden',
        'balcony',
        'number_departments',
        'area_from',
    ];

    public function realEstateProject(): BelongsTo
    {
        return $this->belongsTo(RealEstateProject::class);
    }
}

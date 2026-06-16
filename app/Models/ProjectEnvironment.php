<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ProjectEnvironment extends Model
{
    protected $fillable = [
        'real_estate_project_id',
        'type',
        'title',
        'description',
        'image',
        'sort_order',
    ];

    public function realEstateProject(): BelongsTo
    {
        return $this->belongsTo(RealEstateProject::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'project',
        'unit',
        'name',
        'last_name',
        'phone',
        'document_type',
        'document_number',
        'email',
        'message',
        'terms_accepted',
    ];

    protected $casts = [
        'terms_accepted' => 'boolean',
    ];
}

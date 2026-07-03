<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $fillable = [
        'name',
        'address',
        'mail',
        'phone',
        'typedocument',
        'document',
        'services',
        'hired',
        'typeclaim',
        'description',
        'isauthorization',
        'father_name',
        'father_document',
        'father_mail',
        'father_phone',
        'father_address',
        'reference_number',
    ];
}

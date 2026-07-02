<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'title',
        'name',
        'number',
    ];

    public function getFormattedNumberAttribute(): string
    {
        $digits = preg_replace('/\D/', '', $this->number);
        $local = substr($digits, -9);

        if (strlen($local) !== 9) {
            return $this->number;
        }

        return sprintf(
            '(+51) %s-%s-%s',
            substr($local, 0, 3),
            substr($local, 3, 3),
            substr($local, 6, 3)
        );
    }
}

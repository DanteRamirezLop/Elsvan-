<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'tag',
        'content',
        'meta_title',
        'meta_description',
        'is_published',
        'published_at',
        'content',
        'info_1',
        'info_2',
        'info_3',
        'image',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public static function eliminarPorId($id): bool
    {
        $foto = self::find($id);

        if (! $foto) {
            return false;
        }

        return $foto->delete();
    }
}

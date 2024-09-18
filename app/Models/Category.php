<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $table = 'ep_category'; // Nama tabel sesuai dengan yang ada di database

    // Kolom-kolom yang boleh diisi (mass-assignable)
    protected $fillable = [
        'title',
        'description',
        'slug',

    ];
    // Mutator untuk membuat slug otomatis
    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->title);
            }
        });
    }
}

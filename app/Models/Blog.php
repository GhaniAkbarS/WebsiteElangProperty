<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'ep_blog'; // Nama tabel sesuai dengan tabel blog Anda di database

    // Kolom-kolom yang bisa diisi (mass-assignable)
    protected $fillable = [
        'category_id', // Hubungan ke tabel kategori
        'title',
        'slug',
        'content',
        'excerpt',
        'status',
        'pageview',
        'keyword',
    ];

    // Mutator untuk membuat slug otomatis
    public static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }

    // Relasi dengan model Category (One to Many)
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

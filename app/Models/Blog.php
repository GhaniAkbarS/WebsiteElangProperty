<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions; // Tambahkan ini untuk menggunakan SlugOptions

class Blog extends Model
{
    use HasFactory, HasSlug; // Perbaiki typo, dari HasFactorym menjadi HasFactory

    // Menentukan tabel yang digunakan
    protected $table = 'ep_blog';

    // Mengizinkan mass assignment pada field berikut
    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'status',
        'keyword',
        'category_id',
        'image',
        'pageview'  // Tambahkan pageview ke dalam fillable
    ];

    // Relasi dengan model Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Cast untuk status enum
    protected $casts = [
        'status' => 'string',
    ];

    // Konfigurasi slug
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')  // Field yang digunakan untuk menghasilkan slug
            ->saveSlugsTo('slug')         // Field tempat menyimpan slug
            ->doNotGenerateSlugsOnUpdate(); // Slug tidak diperbarui saat update
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'ep_slide';

    // Tentukan kolom-kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'link',
    ];
}

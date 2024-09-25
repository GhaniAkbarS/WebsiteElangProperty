<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan oleh model ini
    protected $table = 'ep_slide';

    // Tentukan kolom-kolom yang dapat diisi (fillable)
    protected $fillable = [
        'title',
        'content',
        'image',
        'link',
    ];
}

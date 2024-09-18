<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'ep_category'; // Nama tabel sesuai dengan yang ada di database

    // Kolom-kolom yang boleh diisi (mass-assignable)
    protected $fillable = [
        'title',
        'description',
        'slug',
        
    ];
}

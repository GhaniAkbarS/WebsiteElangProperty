<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealPhoto extends Model
{
    use HasFactory;

    protected $table = 'ep_deal_photo'; // Nama tabel

    protected $fillable = [
        'deal_id',
        'image' // Kolom yang dapat diisi
    ];

    // Relasi ke tabel ep_deal (belongsTo)
    public function deal()
    {
        return $this->belongsTo(Deal::class, 'deal_id', 'id');
        // deal_id adalah foreign key, id adalah primary key di tabel ep_deal
    }
}

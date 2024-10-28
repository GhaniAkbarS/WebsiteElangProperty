<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealPhoto extends Model
{
    use HasFactory;

    protected $table = 'ep_deal_photo';

    protected $fillable = [
        'deal_id',
        'image'
    ];

    //mendefinisikan relasi ke ep-deal
    public function photos(){
        return $this->hasMany(DealPhoto::class, 'deal_id');
    }
}

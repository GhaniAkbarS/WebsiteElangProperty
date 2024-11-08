<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Deal extends Model
{
    use HasFactory;
    protected $table = 'ep_deal';

    protected $fillable = [
        'branch_id',
        'car_brand',
        'car_type',
        'title',
        'slug',
        'deal_date',
        'deal_type',
        'image',
        'keyword',
        'content'
    ];

    public static function getDealTypes()
    {
        return [
            'Mobil Bekas',
            'Mobil Baru',
            'Rumah',
            'Tanah',
            'Ruko'
        ];
    }

    //realsi ep-branch
    public function branch(){
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    //relasi ke ep-deal-photo
    public function photos(){
        return $this->hasMany(DealPhoto::class, 'deal_id');
    }

    public function carBrand()
    {
        return $this->belongsTo(CarBrand::class, 'car_brand_id');
    }
}

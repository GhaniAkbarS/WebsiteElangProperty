<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    use HasFactory;

    protected $table = 'ep_car_brand';

    protected $fillable =[
        'title'
    ];

    public $timestamps = false;
}

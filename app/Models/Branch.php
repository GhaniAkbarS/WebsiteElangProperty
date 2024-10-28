<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'ep_branch';

    protected $fillable = [
        'title',
        'slug',
        'phone',
        'address'
    ];

    //relasi ke ep-deal
    public function deals(){
        return $this->hasMany(Deal::class, 'branch_id');
    }
}

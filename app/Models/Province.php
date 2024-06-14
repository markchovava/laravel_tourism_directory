<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'priority',
        'user_id',
        'name',
        'image',
        'slug',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cities(){
        return $this->hasMany(City::class, 'province_id', 'id');
    }
    
}

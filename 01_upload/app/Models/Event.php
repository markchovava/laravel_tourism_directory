<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'city_id',
        'name',
        'time',
        'date',
        'address',
        'email',
        'phone',
        'description',
        'portrait',
        'landscape',
        'priority',
        'created_at',
        'updated_at',
    ];

    public function city(){
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}

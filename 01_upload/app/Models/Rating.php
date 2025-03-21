<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'place_id',
        'quantity',
        'total',
        'created_at',
        'updated_at',
    ];

    public function place(){
        return $this->belongsTo(Place::class, 'place_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceGuide extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'guide_id',
        'place_id',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function guide(){
        return $this->belongsTo(Guide::class, 'guide_id', 'id');
    }

    public function place(){
        return $this->belongsTo(Place::class, 'place_id', 'id');
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'slug',
        'description',
        'portrait',
        'landscape',
        'priority',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function places(){
        return $this->belongsToMany(Place::class, 'place_guides', 'guide_id', 'place_id')
                ->withTimestamps();
    }

}

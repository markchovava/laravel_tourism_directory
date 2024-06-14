<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'priority',
        'id',
        'user_id',
        'name',
        'image',
        'slug',
        'description',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function places(){
        return $this->belongsToMany(Place::class, 'place_categories', 'category_id', 'place_id')
                ->withTimestamps();
    }
}

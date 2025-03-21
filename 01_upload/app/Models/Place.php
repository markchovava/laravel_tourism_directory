<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'priority',
        'user_id',
        'city_id',
        'province_id',
        'name',
        'slug',
        'description',
        'phone',
        'address',
        'email',
        'website',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function province(){
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function rating(){
        return $this->hasOne(Rating::class, 'place_id', 'id');
    }

    public function reviews(){
        return $this->hasMany(Review::class, 'place_id', 'id');
    }

    public function place_images(){
        return $this->hasMany(PlaceImage::class, 'place_id', 'id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'place_categories', 'place_id', 'category_id')
            ->withTimestamps();
    }

    public function guides(){
        return $this->belongsToMany(Guide::class, 'place_guides', 'place_id', 'guide_id')
            ->withTimestamps();
    }


}

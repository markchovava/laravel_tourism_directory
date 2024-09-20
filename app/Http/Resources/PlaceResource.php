<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'priority' => $this->priority,
            'id' => $this->id,
            'user_id' => $this->user_id,
            'city_id' => $this->city_id,
            'province_id' => $this->province_id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'website' => $this->website,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'rating' => new RatingResource($this->whenLoaded('rating')),
            'user' => new UserResource($this->whenLoaded('user')),
            'city' => new CityResource($this->whenLoaded('city')),
            'province' => new ProvinceResource($this->whenLoaded('province')),
            'place_images' => PlaceImageResource::collection($this->whenLoaded('place_images')),
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'guides' => GuideResource::collection($this->whenLoaded('guides')),
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'city_id' => $this->city_id,
            'name' => $this->name,
            'time' => $this->time,
            'date' => $this->date,
            'address' => $this->address,
            'email' => $this->email,
            'phone' => $this->phone,
            'portrait' => $this->portrait,
            'landscape' => $this->landscape,
            'priority' => $this->priority,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => new UserResource($this->whenLoaded('user')),
            'city' => new CityResource($this->whenLoaded('city')),
        ];
    }
}

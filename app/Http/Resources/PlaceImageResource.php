<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaceImageResource extends JsonResource
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
            'place_id' => $this->place_id,
            'user_id' => $this->user_id,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'place' => new PlaceResource($this->whenLoaded('place')),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
